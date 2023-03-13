let data = ""

$("#editBtn").click(function (e) {

    e.preventDefault();

    let str = {
        nickname : $("#editForm #nickname").val(),
        email : $("#editForm #email").val(),
        password : $("#editForm #password").val(),
        newPassword : $("#editForm #newPassword").val(),
    }

    let file = document.getElementById("avatar").files[0]

    if (file !== undefined) {

        let fileType = file["type"];
        let validImageTypes = ["image/jpeg", "image/png"];
    
        if ($.inArray(fileType, validImageTypes) < 0) {
            
            console.log("Le fichier joint n'est pas de type jpeg ou png")
            return
        }

        let reader = new FileReader();

        reader.readAsDataURL(file);
        reader.addEventListener("load", () => {
    
            data = { str, avatar: reader.result }
            myAjax(data)
        })

    } else {

        data = str
        myAjax(data)
    }
})

function myAjax (data){
        
    $.ajax({
        type: "post",
        url: "./AJAX/php/do.editUser.php",
        data: data,
        success: function (data) {
            console.log(data)
        }
    });
}

