<?php
session_start();

if (isset($_POST["login"])) {

    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Contoh username & password
    if ($username == "Melati" && $password == "12345") {

        // Simpan ke Session
        $_SESSION["username"] = "Melati";
        $_SESSION["role"] = "Admin";

        header("Location: mahasiswa.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #f3f4f6;
        }
    </style>
</head>

<body>

<div class="min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-3xl p-10 w-full max-w-md">

        <h1 class="text-3xl font-bold text-center text-indigo-600">
            Login
        </h1>

        <p class="text-center text-gray-500 mt-2 mb-8">
            Silakan login terlebih dahulu
        </p>

        <?php if(isset($error)){ ?>
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="mb-5">
                <label class="block mb-2 font-medium">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <button
                type="submit"
                name="login"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl transition">
                Login
            </button>

        </form>

    </div>

</div>

</body>

</html>