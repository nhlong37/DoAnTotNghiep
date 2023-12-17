$(document).ready(function () {
/* Reader image */
function readImage(inputFile, elementPhoto) {
    if (inputFile[0].files[0]) {
        if (inputFile[0].files[0].name.match(/.(jpg|jpeg|png)$/i)) {
            var size = parseInt(inputFile[0].files[0].size) / 1024;

            if (size <= 4096) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(elementPhoto).attr("src", e.target.result);
                };
                reader.readAsDataURL(inputFile[0].files[0]);
            } else {
                notifyDialog(
                    "Dung lượng hình ảnh lớn. Dung lượng cho phép <= 100MB ~ 4096KB"
                );
                return false;
            }
        } else {
            $(elementPhoto).attr("src", "");
            notifyDialog("Định dạng hình ảnh không hợp lệ");
            return false;
        }
    } else {
        $(elementPhoto).attr("src", "");
        return false;
    }
}

/* Photo zone */
function photoZone(eDrag, iDrag, eLoad) {
    if ($(eDrag).length) {
        /* Drag over */
        $(eDrag).on("dragover", function () {
            $(this).addClass("drag-over");
            return false;
        });

        /* Drag leave */
        $(eDrag).on("dragleave", function () {
            $(this).removeClass("drag-over");
            return false;
        });

        /* Drop */
        $(eDrag).on("drop", function (e) {
            e.preventDefault();
            $(this).removeClass("drag-over");

            var lengthZone = e.originalEvent.dataTransfer.files.length;

            if (lengthZone == 1) {
                $(iDrag).prop("files", e.originalEvent.dataTransfer.files);
                readImage($(iDrag), eLoad);
            } else if (lengthZone > 1) {
                notifyDialog("Bạn chỉ được chọn 1 hình ảnh để upload");
                return false;
            } else {
                notifyDialog("Dữ liệu không hợp lệ");
                return false;
            }
        });

        /* File zone */
        $(iDrag).change(function () {
            readImage($(this), eLoad);
        });
    }
}

/* PhotoZone */
if ($("#photo-zone").length) {
    photoZone("#photo-zone", "#file-zone", "#photoUpload-preview img");
}
});