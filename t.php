<?php require_once("_header.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ticket = getTicket($_GET['id']);
    $images = getTicketImages($_GET['id']);
    $messages = getMessages($_GET['id']);
} else {
    header("location: ticket");
}


?>
<style>
    .imggs {
        gap: 15px;
    }
</style>
<div class="dx-main">
    <div class="dx-separator"></div>
    <div class="dx-box-5 pb-100 bg-grey-6">
        <div class="container">
            <div class="">
                <div class="col-lg-16">
                    <div class="dx-box dx-box-decorated">
                        <div class="dx-blog-post dx-ticket dx-ticket-open">
                            <div class="dx-blog-post-box pt-30 pb-30">
                                <h2 class="h4 mnt-5 mb-9 dx-ticket-title"><?= $ticket['title'] ?></h2>
                            </div>
                            <div class="dx-separator"></div>
                            <div style="background-color: #fafafa;">
                                <ul class="dx-blog-post-info dx-blog-post-info-style-2 mb-0 mt-0">
                                    <li><span><span class="dx-blog-post-info-title">Ticket Id</span>#<?= $ticket['ticket_id'] ?></span></li>
                                    <li><span><span class="dx-blog-post-info-title">Durum</span><?= $ticket['status_name'] ?></span></li>
                                    <li><span><span class="dx-blog-post-info-title">Tarih</span><?= $ticket['createdAt'] ?></span></li>
                                </ul>
                            </div>
                            <div class="dx-separator"></div>
                            <div class="dx-comment dx-ticket-comment">
                                <div>
                                    <div class="dx-comment-cont">
                                        <a href="#" class="dx-comment-name"><?= $ticket['title'] ?></a>
                                        <div class="dx-comment-date"><?= $ticket['createdAt'] ?></div>
                                        <div class="dx-comment-text">
                                            <p class="mb-0"><?= $ticket['desc'] ?></p>
                                        </div>

                                        <div class="imggs" style="display: flex; padding-top:15px">
                                            <?php foreach ($images as $image) { ?>
                                                <a href="tickets/<?= $_GET['id'] ?>/<?= $image['image'] ?>" target="blank" class="dx-comment-file dx-comment-file-jpg">
                                                    <span class="dx-comment-file-img"><img src="assets/images/icon-jpg.svg" alt="" width="36"></span>
                                                    <span class="dx-comment-file-name"><?= $image['image'] ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($messages as $message) {
                            ?>
                                <div class="dx-comment dx-ticket-comment dx-comment-replied dx-comment-new">
                                    <div>
                                        <div class="dx-comment-cont">
                                            <a href="#" class="dx-comment-name"> <?= ($message['by'] == 0 ? 'Admin' : 'Ben') ?> <span class="dx-comment-replied">Tarafından</span>
                                            </a>
                                            <div class="dx-comment-date"><?= $message['createdAt'] ?></div>
                                            <div class="dx-comment-text">
                                                <p><?= $message['message'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="dx-separator mnt-1"></div>
                            <div class="dx-blog-post-box">
                                <h3 class="h6 mb-25">Mesaj Yaz</h3>
                                <form class="dx-form" method="post">
                                    <div class="dx-form-group">
                                        <input style="border: 2px solid; border-radius: 10px;border-color: black;" type="text" name="message" class="form-control">
                                        <div class="row justify-content-between vertical-gap dx-dropzone-attachment pt-5">
                                            <div class="col-auto dx-dropzone-attachment-btn">
                                                <button class="dx-btn dx-btn-lg" type="submit" name="newMMSG">Gönder</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "_foot.php" ?>