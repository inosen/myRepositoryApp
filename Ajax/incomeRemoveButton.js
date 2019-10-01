
function deleteIncomeRequest(id){

        console.log("you click income remove button " + id);

        $.ajax({
            type:'POST',
            url:'http://localhost/MyRepository/Ajax/incomeDelete.php',
            data:{id:id},
            success: function(data){
                if(data){
                    location.reload();
                }else{
                    alert("can't delete");
                }
            }

        });
}

