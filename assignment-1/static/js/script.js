// $(document).ready( ()=>{

//     $('.studentDelete').click(()=>{
//         var anchor = $(this);

//         $.ajax({
//             url: './controllers/students/student.delete.php',
//             type: 'GET',
//             dataType: 'json',
//             data: {id: anchor.attr('id')},
//         })
//         .done((reponse)=>{
//             if(Response.status==1){
//                 //anchor.closest('tr').remove();
//                 alert("Done");
//             }
//         })
//         .fail(()=>{
//             alert("Connection Error");
//         });

//     });

// });
