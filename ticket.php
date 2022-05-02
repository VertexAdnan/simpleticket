<?php include '_header.php'; ?>
<div class="dx-main">
    <header class="dx-header dx-box-1">
        <div class="container">
            <div class="bg-image bg-image-parallax">
                <img src="assets/images/bg-header-4.png" class="jarallax-img" alt="">
                <div style="background-color: rgba(27, 27, 27, .8);"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <h1 class="h2 mb-30 text-white text-center">Ticket Ara</h1>
                    <input type="text" id="search-input" class="form-control" placeholder="Ticket Başlığı...">
                </div>
            </div>
        </div>
    </header>
    <div class="dx-separator"></div>
    <div class="dx-box-5 bg-grey-6">
        <div class="container">
            <div class="row align-items-center justify-content-between vertical-gap mnt-30 sm-gap mb-50">
                <div class="col-auto">
                    <h2 class="h4 mb-0 mt-0">Oluşturduğun Talepler</h2>
                </div>
                <div class="col pl-30 pr-30 d-none d-sm-block">
                    <div class="dx-separator ml-10 mr-10"></div>
                </div>
                <div class="col-auto">
                    <a href="create-ticket" class="dx-btn dx-btn-md">Yeni Talep Oluştur</a>
                </div>
            </div>
            <?php foreach (getTickets() as $ticket) { ?>
                <a href="t?id=<?= $ticket['ticket_id'] ?>" class="dx-ticket-item dx-ticket-new dx-ticket-open dx-block-decorated">
                    <span class="dx-ticket-cont">
                        <span class="dx-ticket-name"> <?= $ticket['title'] ?></span>
                        <span class="dx-ticket-title h5">
                            <?= substr($ticket['desc'], 0, 100) ?>...
                        </span>
                        <ul class="dx-ticket-info">
                            <li>Oluşturma: <?= $ticket['createdAt'] ?></li>
                            <li>Konu: <?= $ticket['sub_name'] ?></li>
                        </ul>
                    </span>
                    <span class="dx-ticket-status"> <?= $ticket['status_name'] ?></span>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="dx-separator"></div>
</div>


<?php include '_foot.php'; ?>