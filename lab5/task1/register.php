<?php
session_start();

class User
{
    public $email;
    public $password;
    public $name;
    public $surname;
    public $gender;
    public $dob;
    public $occupation;
    public $hobbies;
    public $about;

    public function __construct($email, $password, $name, $surname, $gender, $dob, $occupation, $hobbies, $about)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->occupation = $occupation;
        $this->hobbies = $hobbies;
        $this->about = $about;
    }
}

/**
 * @param $pdo PDO
 * @param $table string
 * @return array | false
 */
function fetchAll($pdo, $table)
{
    return $pdo->query("SELECT * FROM $table")->fetchAll();
}

/**
 * @param $pdo PDO
 * @param $table string
 * @param $email string
 * @return mixed
 */
function fetchOne($pdo, $table, $email)
{
    $sql = "SELECT * FROM $table WHERE email=:email";
    $prepare = $pdo->prepare($sql);
    $prepare->bindValue(':email', $email);
    $prepare->execute();
    return $prepare->fetch(PDO::FETCH_ASSOC);
}

/**
 * @param $pdo PDO
 * @param $user User
 * @return bool
 */
function createUser($pdo, $user)
{
    if (is_array(fetchOne($pdo, "users", $user->email))) {
        echo "Аккаунт за данною ел.поштою вже існує";
        exit();
    }

    $statement = $pdo->prepare("INSERT INTO users (email, password, name, surname, gender, birthdate, occupation, about, hobbies) VALUES (:email, :password, :name, :surname, :gender, :birthdate, :occupation, :about, :hobbies )");
    return $statement->execute([
        'email' => $user->email,
        'password' => $user->password,
        'name' => $user->name,
        'surname' => $user->surname,
        'gender' => $user->gender,
        'birthdate' => $user->dob,
        'occupation' => $user->occupation,
        'hobbies' => $user->hobbies,
        'about' => $user->about
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $dob = htmlspecialchars($_POST["dob"]);
    $occupation = htmlspecialchars($_POST["occupation"]);
    $hobbies = htmlspecialchars($_POST["hobbies"]);
    $about = htmlspecialchars($_POST["about"]);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=lab5;charset=utf8", 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user = new User($email, $password, $name, $surname, $gender, $dob, $occupation, $hobbies, $about);

        if (createUser($pdo, $user)) {
            echo 'User created';
        } else {
            echo 'Error creating user';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
