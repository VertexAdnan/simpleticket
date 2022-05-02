<?php
require_once("config.php");

if (!connect()) {
    die("Something went wrong!");
}

if (isset($_POST['subAdd'])) {
    if(addSubject($_POST['subAdd'])){
        header("location: subjects");
    }
}

if(isset($_POST['addUser']))
{
    if(createUser($_POST['username'], $_POST['password'], $_POST['userlevel'])){
        header("location: users");
    }
}

if (isset($_POST['auth'])) {
    $user = auth($_POST['username'], $_POST['password']);


    if ($user) {
        $_SESSION['customer_id'] = $user[0]['customer_id'];
        ($user[0]['userlevel'] == "0" ? $_SESSION['type'] = "customer" : "admin");
        header("location: ticket");
    } else {
        header("location: ?failed");
    }
}

if (isset($_POST['createTicket'])) {
    print_r(createTicket($_POST['title'], $_POST['desc'], $_POST['sub']));
}

if (isset($_POST['newMMSG'])) {
    if (createMessage($_POST['message'], $_GET['id'])) {
        if (isset($_SESSION['type'])) {
            if ($_SESSION['type'] == "customer") {
                setStatus($_GET['id'], 2);
            } else {
                setStatus($_GET['id'], 1);
            }
        }
        header("location: t?id=" . $_GET['id']);
    }
}

function getSubjects()
{
    $query = connect()->prepare("SELECT * FROM subjects ORDER BY sub_id DESC");
    $query->execute();

    return $query->fetchAll();
}

function connect()
{
    return new PDO('mysql:host=' . mysql_host . ';dbname=' . mysql_table . '', mysql_user, mysql_pass);
}

function createUser($username, $pass, $level)
{
    $pass = md5($pass);
    $query = connect()->prepare("INSERT INTO `users`(`username`, `password`, `userlevel`) VALUES ('$username','$pass','$level')");

    return $query->execute();
}

function getUsers()
{
    $query = connect()->prepare("SELECT * FROM users ORDER BY customer_id DESC");
    $query->execute();

    return $query->fetchAll();
}

function addSubject($name)
{
    $query = connect()->prepare("INSERT INTO `subjects`( `sub_name`) VALUES ('$name')");

    return $query->execute();
}

function auth($username, $password)
{
    $md5 = md5($password);
    $query = connect()->prepare("SELECT * FROM users WHERE username=:username AND password = :pass");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->bindParam("pass", $md5, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() == 1) {
        return $query->fetchAll();
    } else {
        return false;
    }
}

function isAdmin()
{
    $query = connect()->prepare("SELECT userlevel FROM users WHERE customer_id = '" . $_SESSION['customer_id'] . "'");
    $query->execute();
    $level = $query->fetchColumn();

    if ($level == 1) {
        return true;
    } else {
        return false;
    }
}

function setStatus($id, $set)
{
    $query = connect()->prepare("UPDATE tickets SET status = '$set' WHERE ticket_id = '$id'");
    return $query->execute();
}

function getStatus($id)
{
    $query = connect()->prepare("SELECT status_name FROM ticket_status WHERE status_id='$id' LIMIT 1");
    $query->execute();

    return $query->fetchAll()[0]['status_name'];
}

function getSubject($id)
{
    $query = connect()->prepare("SELECT sub_name FROM subjects WHERE sub_id='$id' LIMIT 1");
    $query->execute();

    return $query->fetchAll()[0]['sub_name'];
}

function getTickets($u_id = '')
{
    if ($u_id != '') {
        $query = connect()->prepare("SELECT * FROM tickets WHERE user_id = '$u_id' LEFT JOIN ticket_status ON tickets.status = ticket_status.status_id ORDER BY ticket_id DESC");
    } else {
        $query = connect()->prepare("SELECT * FROM tickets LEFT JOIN ticket_status ON tickets.status = ticket_status.status_id LEFT JOIN subjects ON tickets.sub = subjects.sub_id ORDER BY ticket_id DESC");
    }

    $query->execute();
    return $query->fetchAll();
}

function getTicket($id)
{
    $query = connect()->prepare("SELECT * FROM tickets LEFT JOIN ticket_status ON tickets.status = ticket_status.status_id LEFT JOIN subjects ON tickets.sub = subjects.sub_id WHERE tickets.ticket_id = '$id' LIMIT 1");
    $query->execute();

    return $query->fetchAll()[0];
}

function getTicketImages($id)
{
    $query = connect()->prepare("SELECT * FROM ticket_images WHERE ticket_id = '$id'");
    $query->execute();

    return $query->fetchAll();
}

function createMessage($message, $id)
{
    $db = connect();
    $by = $_SESSION['customer_id'];
    $query = $db->prepare("INSERT INTO `ticket_messages`(`by`, `message`, `ticket_id`, `createdAt`) VALUES ('$by','$message','$id','" . date('y-m-d H:i:s') . "')");
    return $query->execute();
}

function getMessages($id)
{
    $query = connect()->prepare("SELECT * FROM ticket_messages WHERE ticket_id = '$id' ORDER BY id DESC");
    $query->execute();

    return $query->fetchAll();
}

function createTicket($title = '', $desc = '', $sub = '')
{
    $dbh = connect();
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
    $query = $dbh->prepare("INSERT INTO `tickets`(`title`, `desc`, `sub`, `status`, `user_id`, `createdAt`) VALUES ('$title','$desc','$sub','1','1','" . date('y-m-d h:i:s') . "')");
    //$dbh->commit();
    if ($query->execute()) {
        $id = $dbh->lastInsertId();

        if (isset($_FILES)) {
            for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
                if (!file_exists('tickets/' . $id)) {
                    mkdir('tickets/' . $id, 0777);
                }
                $target_dir = "tickets/" . $id . "/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    insertImage($_FILES["fileToUpload"]["name"][$i], $id);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        //echo $id;

        return header("location: ticket?id=" . $id);
    } else {
        return false;
    }
}

function uploadImage($id)
{
}

function insertImage($image, $id)
{
    $query = connect()->prepare("INSERT INTO `ticket_images`(`image`, `ticket_id`) VALUES ('$image','$id')");

    return $query->execute();
}
