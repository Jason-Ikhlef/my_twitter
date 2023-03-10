let data = ""

$("#editBtn").click(function (e) {

    e.preventDefault();

    const form = $("#editForm")
    let str = form.serialize()
    let file = document.getElementById("avatar").files[0]

    if (file !== undefined) {

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

