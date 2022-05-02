<?php include '_header.php'; ?>
<style>
    .remove {
        display: block;
        border-radius: 10px;
        background: white;
        width: 60px;
    }
</style>
<div class="dx-main">
    <header class="dx-header dx-box-1">
        <div class="container">
            <div class="bg-image bg-image-parallax">
                <img src="assets/images/bg-header-4.png" class="jarallax-img" alt="">
                <div style="background-color: rgba(27, 27, 27, .8);"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <h1 class="h2 mb-30 text-white text-center">Yeni Konu Ekle</h1>
                    <form method="post">
                        <input type="text" name="subAdd" class="form-control" placeholder="Konu...">
                        <button class="form-control">Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="dx-separator"></div>
    <div class="dx-box-5 bg-grey-6">
        <div class="container">
            <?php foreach (getSubjects() as $sub) { ?>
                <a id="<?= $sub['sub_id'] ?>" class="dx-ticket-item dx-ticket-new dx-ticket-open dx-block-decorated">
                    <span class="dx-ticket-cont">
                        <span class="dx-ticket-name"> <?= $sub['sub_name'] ?></span>
                    </span>
                    <span class="dx-ticket-status">
                        <button id="<?= $sub['sub_id'] ?>" class="remove">Sil</button>
                    </span>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="dx-separator"></div>
</div>

<script>
    $(".remove").on("click", (e) => {
        let id = e.currentTarget.id;
        $.ajax({
            type: "POST",
            url: "api/removeSub",
            dataType: "JSON",
            data: {
                id: id
            },
            success: (data) => {
                console.log(data)
                if(data.status == "success"){
                    $(`#${id}`).remove()
                }
            }
        })
    })
</script>

<?php include '_foot.php'; ?>