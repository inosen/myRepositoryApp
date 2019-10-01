function deleteOutgoingRequest(id){

    console.log("you click outgoing remove button " + id);

    $.ajax({
        type:'POST',
        url:'http://localhost/MyRepository/Ajax/outgoingDelete.php',
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