<?php require_once('_header.php') ?>
<div class="dx-main">
    <div class="dx-separator"></div>
    <div class="dx-box-5 pb-100 bg-grey-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="dx-box dx-box-decorated">
                        <div class="dx-box-content">
                            <h2 class="h6 mb-6">Yeni Ticket</h2>
                        </div>
                        <div class="dx-separator"></div>
                        <form method="post" class="dx-form" enctype="multipart/form-data">
                            <div class="dx-box-content">
                                <div class="dx-form-group">
                                    <label for="select-product" class="mnt-7">Konu</label>
                                    <select class="form-control dx-select-ticket" name="sub" id="select-product">
                                        <?php foreach (getSubjects() as $sub) { ?>
                                            <option value="<?= $sub['sub_id'] ?>"><?= $sub['sub_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dx-separator"></div>
                            <div class="dx-box-content">
                                <div class="dx-form-group">
                                    <label for="subject" class="mnt-7">Başlık</label>
                                    <input type="text" class="form-control form-control-style-2" name="title" placeholder="Başlık Giriniz">
                                </div>
                                <div class="dx-form-group">
                                    <label class="mnt-7">Açıklama</label>
                                    <div class="dx-editor-quill">
                                        <textarea class="form-control form-control-style-2" name="desc" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="dx-box-content pt-0">
                                <div class="row justify-content-between vertical-gap dx-dropzone-attachment">
                                    <div class="col-auto dx-dropzone-attachment-add">
                                        <input type="file" name="fileToUpload[]" class="form-controler" id="" value="Görseller" multiple />
                                    </div>
                                    <div class="col-auto dx-dropzone-attachment-btn">
                                        <button class="dx-btn dx-btn-lg" type="submit" name="createTicket">Talep Oluştur</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '_foot.php'; ?>