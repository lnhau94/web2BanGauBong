<div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
    <label style="font-size: 24px; color: #950b2d; "><b>Nhập kho sản phẩm có sẵn</b></label><br/>
    <input type="file" id="fileUpload" />
    <input class="btn-add-user" type="button" id="upload" value="Import" onclick="UploadProcess()" />
    <br/>
</div>
<div id="dataTable">
    <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
        <button class="btn-submit" onclick="saveStorage()">Save</button>
    </div>
    <div class="hau-instock-table-header">
        <label>Mã sản phẩm</label>
        <label>Tên sản phẩm</label>
        <label>Số lượng đã nhập</label>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
<script type="text/javascript">

    function UploadProcess() {
        //Reference the FileUpload element.
        var fileUpload = document.getElementById("fileUpload");

        //Validate whether File is valid Excel file.
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (fileUpload) != "undefined") {
                var reader = new FileReader();

                //For Browsers other than IE.
                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        GetTableFromExcel(e.target.result);
                    };
                    reader.readAsBinaryString(fileUpload.files[0]);
                } else {
                    //For IE Browser.
                    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        GetTableFromExcel(data);
                    };
                    reader.readAsArrayBuffer(fileUpload.files[0]);
                }
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid Excel file.");
        }
    };
    function GetTableFromExcel(data) {
        //Read the Excel File data in binary
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
        workbook.SheetNames.forEach(function(sheetName) {
            // Here is your object
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
            var json_object = JSON.stringify(XL_row_object);
            // console.log(json_object);
            // console.log(XL_row_object[1])
            XL_row_object.forEach(e=>{
                showData(e.ProductId,e.Storage,e.ProductName)
                })
            })


    };

    function showData(productId, storage, productName){
        document.getElementById("dataTable").innerHTML +=
            '<div class="hau-instock-table-row">' +
            '<label class="item-id">' + productId +'</label>' +
            '<label class="item-name">' + productName +'</label>' +
            '<input class="item-qty" type="number" value="' + storage +'">' +
            '</div>'
        ;
    }
    function saveStorage(){
        document.querySelectorAll(".hau-instock-table-row").forEach(element =>{
            updateStorage(
                element.querySelector(".item-id").innerText,
                element.querySelector(".item-qty").value
            );
        })
    }
    function updateStorage(productId, storage){
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);

            }
        }
        xhr.open("POST","/api/instock.php?productid=" + productId + "&storage=" + storage,false);
        xhr.send()
    }
</script>