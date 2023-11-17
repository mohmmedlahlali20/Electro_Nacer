<?php include './tmp/head.php';
include './tmp/navbar.php'; ?>

<section>
    <div style="display: flex; justify-content: space-around; font-size: 2rem; font-family: 'Times New Roman', Times, serif;font-size: 45px; color: blue;" class="card-header">
        

        <form style="margin-left: 20rem ;" action="" method="post">
            <select style="font-size: 2rem; border-radius:44px; color:bleu; margin-left: -300px;  padding: 2px 5px;" name="cate">
                <option value="all">filtre par categore</option>
                <option value="laptop">laptop</option>
                <option value="speaker">speaker</option>
                <option value="play">play</option>
            </select>
          
            <input style="overflow-x: hidden;" class="btn btn-dark mb-2" style=" color: #0073e6; margin-bottom:20px; border-radius:44px; font-size:20px; width:80px; height:35px;" type="submit" value="clique">
        </form>
        OUR PRODUCT
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $description = $_POST['cate'];

        $sql = "SELECT * FROM product WHERE description = '$description'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            // Query failed
            die("Error: " . mysqli_error($conn));
        }

        // Utiliser un tableau pour stocker tous les produits correspondants
        $products = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $products[] = $row;
        }

        if ($products != '') {
    ?>
            <div class="card">
                <div class="row">
                    <?php
                    foreach ($products as $product) {
                    ?>
                        <div class="card-body col-lg-4">
                            <div class="height d-flex  align-items-center">
                                <div class="card p-1">
                                    <div class="d-flex justify-content-between align-items-center ">
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
                                            <img class="img-thumbnail" alt="Logo HTML w3" style="width: 150px; margin-left:20px;"  src="./layout/img/Nouveau_projet1.png" width="200">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                                        <span>Lorem, ipsum dolor.</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet. </p>
                                    <button class="btn btn-danger">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            // Query failed
            die("Error: " . mysqli_error($conn));
        }

        // Utiliser un tableau pour stocker tous les produits correspondants
        $products = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $products[] = $row;
        }

        if ($products != '') {
        ?>
            <div class="card">
                <div class="row">
                    <?php
                    foreach ($products as $product) {
                    ?>
                        <div style="overflow-x: hidden;" class="card-body col-lg-4">
                            <div class="height d-flex  align-items-center">
                                <div class="card p-1">
                                    <div class="d-flex justify-content-between align-items-center ">
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
                                            <img style="width: 150px; margin-left:20px" src="./layout/img/hhhh.jpg" width="200">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                                        <span>Lorem, ipsum dolor.</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet. </p>
                                    <button class="btn btn-danger">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
    <?php
        }
    }
    ?>

</section>

<?php include './tmp/footer.php' ?>
<?php include './tmp/script.php' ?>