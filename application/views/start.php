<style>
    input[type=text], input[type=email], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #0072bc;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #184ca0;
    }
</style>
<section style="padding: 10px 250px;">
    <form action="<?= base_url() ?>welcome/registeruser/<?= $table ?>" method="post">
        <label for="fname">Имя</label>
        <input type="text" name="name" placeholder="Ваше имя.." required>
        <label for="lemail">Почта</label>
        <input type="email" name="email" placeholder="Ваш адресс почты.." required>
        <input type="submit" value="Начать">
    </form>
</section>