<?php
include './tmp/head.php';
include './tmp/navbar.php';

// Assuming $conn is already established

$description = isset($_POST['cate']) ? $_POST['cate'] : 'all';
$filterSQL = ($description != 'all') ? " WHERE description = '$description'" : '';

$sql = "SELECT titre, description, prix, prix_max, pri_min, quantité FROM product$filterSQL";
$query =  mysqli_query($conn, $sql);

if (!$query) {
    die("Error: " . mysqli_error($conn));
}

$products = [];
while ($row = mysqli_fetch_assoc($query)) {
    $products[] = $row;
}

?>

<section>
    <div class="card-header" style="display: flex; justify-content: space-around; font-size: 45px; color: blue;">
        <form action="" method="post" style="margin-left: 20rem;">
            <select name="cate"
                style="font-size: 2rem; border-radius: 44px; color: blue; margin-left: -300px; padding: 2px 5px;">
                <option value="all">filtre par catégorie</option>
                <option value="laptop">laptop</option>
                <option value="speaker">speaker</option>
                <option value="play">play</option>
            </select>
            <input type="submit" class="btn btn-dark mb-2"
                style="color: #0073e6; margin-bottom: 20px; border-radius: 44px; font-size: 20px; width: 80px; height: 35px;"
                value="clique">
        </form>
        OUR PRODUCT
    </div>
<section>
         <div class="card">
        <div class="row">
            <?php
            foreach ($products as $product) {
            ?>
            <div class="card-body col-lg-4">
                <div class="height d-flex align-items-center">
                    <div class="card p-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mt-2">
                                <h4 class="text-uppercase"><?= $product['titre'] ?></h4>
                                <div class="mt-5">
                                    <h5 class="text-uppercase mb-0"><?= $product['description'] ?></h5>
                                    <h1 class="main-heading mt-0"><?= $product['prix'] ?></h1>
                                    <div class="d-flex flex-row user-ratings">
                                        <span>&#9733;&#9733;&#9733;&#9733;&#9733; </span>
                                        <h6 class="text-muted ml-1">5/5</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="image">
                                <img class="img-thumbnail" alt="Product Image"
                                    style="width: 70%; position:relative; margin-left:40px;" src="./layout/img/hhhh.jpg"
                                    width="60%">
                            </div>
                            <div>
                                <p
                                    style="position: relative;width: 147px;left: 12px;margin-top: 0;margin-bottom: 1rem;font-family: cursive; ">
                                    Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                        <br>
                        <div
                            style="display: flex;justify-content: space-between;align-items: center;margin-top: 10px;  margin-bottom: 10px;">

                            <h3 style="color:blue; font-size:20px; font-size:bold;"></h3>Prix Max:
                            <?= $product['prix_max'] . '$' ?></h3>

                            <h3 style="color:blue; font-size:20px; font-size:bold;">Prix Min:
                                <?= $product['pri_min'] . '$' ?></h3>

                            <h3 style="color:blue; font-size:20px; font-size:bold;">Quantité:
                                <?= $product['quantité'] . '$' ?></h3>
                        </div>

                        <button class="btn btn-danger">Add to cart</button>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include './tmp/footer.php' ?>
<?php include './tmp/script.php' ?>