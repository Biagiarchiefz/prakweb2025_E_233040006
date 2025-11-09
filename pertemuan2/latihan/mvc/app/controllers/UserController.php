<?php

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function index() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'detail':
                if (isset($_GET['id'])) {
                    $this->detail($_GET['id']);
                } else {
                    $this->list();
                }
                break;
            case 'create':
                $this->create();
                break;
            case 'edit':
                if (isset($_GET['id'])) {
                    $this->edit($_GET['id']);
                } else {
                    $this->list();
                }
                break;
            case 'delete':
                if (isset($_GET['id'])) {
                    $this->delete($_GET['id']);
                } else {
                    $this->list();
                }
                break;
            case 'store':
                $this->store();
                break;
            case 'update':
                $this->update();
                break;
            default:
                $this->list();
                break;
        }
    }

    // Function untuk menampilkan daftar user
    private function list() {
        $users = $this->userModel->getAllUsers();
        $message = isset($_GET['message']) ? $_GET['message'] : '';
        require_once __DIR__ . '/../views/list.php';
    }

    // Fucntion untuk detail user
    private function detail($id) {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            header('Location: index.php?message=' . urlencode('User tidak ditemukan'));
            exit;
        }
        require_once __DIR__ . '/../views/detail.php';
    }

    // function untum form
    private function create() {
        require_once __DIR__ . '/../views/form.php';
    }

    // function untuk edit user
    private function edit($id) {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            header('Location: index.php?message=' . urlencode('User tidak ditemukan'));
            exit;
        }
        $isEdit = true;
        require_once __DIR__ . '/../views/form.php';
    }

    // Post user
    private function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);

            if (empty($name) || empty($email)) {
                header('Location: index.php?action=create&message=' . urlencode('Nama dan email harus diisi'));
                exit;
            }

            if ($this->userModel->createUser($name, $email)) {
                header('Location: index.php?message=' . urlencode('User berhasil ditambahkan'));
            } else {
                header('Location: index.php?action=create&message=' . urlencode('Gagal menambahkan user'));
            }
            exit;
        }
    }

    // Update user
    private function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);

            if (empty($name) || empty($email)) {
                header('Location: index.php?action=edit&id=' . $id . '&message=' . urlencode('Nama dan email harus diisi'));
                exit;
            }

            if ($this->userModel->updateUser($id, $name, $email)) {
                header('Location: index.php?message=' . urlencode('User berhasil diupdate'));
            } else {
                header('Location: index.php?action=edit&id=' . $id . '&message=' . urlencode('Gagal mengupdate user'));
            }
            exit;
        }
    }

    // Delete user
    private function delete($id) {
        if ($this->userModel->deleteUser($id)) {
            header('Location: index.php?message=' . urlencode('User berhasil dihapus'));
        } else {
            header('Location: index.php?message=' . urlencode('Gagal menghapus user'));
        }
        exit;
    }
}