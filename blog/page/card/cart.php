<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document of card</title>
    <link rel="stylesheet" href="cart.css">
    <script src="../../fram/js/script.js"></script>
</head>
<body>
    <div id="grid">
        <div class="flex">
            <table id="cart-content">
                <caption>tottal order</caption>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Tottal</th>
                        <th>Price</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
            <div class="from" id="check">
                <form id="info">
                    <div class="text">
                        <label for="Name">Youre name :</label>
                        <input type="text" required minlength="4" placeholder="Mr. Name" name="name" id="name">
                    </div>
                    <div class="text">
                        <label for="phone">Phone number : </label>
                        <input type="tel" name="phone" id="phone" pattern="[0-9]{11}" placeholder="019XXXXXX" required>
                    </div>
                    <div class="text">
                        <label for="zone">Order receve place :</label>
                        <textarea name="zone" required id="zone"  placeholder="Road No : 01, House No : 02, Flat No : 5th Floor, Vill: Dhanua ,Union: Masimpur, Upaz: Shibpur, Dist: Narsingdi" cols="30" rows="10"></textarea>
                    </div>
                    <div class="text">
                        <p class="letter"></p>
                    </div>
                    <div class="text">
                        <!--<input id="check" class="submited" type="submit" value="checkout">-->
                        <button class="out">CHECK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="cart.js"></script>
</body>
</html>