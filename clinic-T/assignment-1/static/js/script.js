$(document).ready( ()=>{

    $( "#courseNameSearchField" )
  .keyup(function() {
    let value = $( this ).val();
    let tableHTML = 'Not Found';
    $.ajax({
        url:"./course-search-json.php",
        type: 'GET',
        dataType: 'json',
        data: {phrase: value}
    })
    .done(( data )=>{
        console.log( "Sample of data:", data.slice() );
        
        data.forEach(element => {
            tableHTML = tableHTML + `
                <tr>
                <th scope="row">` + element.id + `</th>
                <td>`+ element.name +`</td>
                <td>`+ element.max_degree +`</td>
                <td>`+ element.study_year +`</td>
                <td>
                    <a href="./courses.php?v=edit&id=`+ element.id +`" class="btn btn-primary">Edit</a>
                    
                    <form action="./courses.php?v=delete" method="POST" class="d-inline">
                        <input type="hidden" name="courseId" value="`+ element.id +`">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>
                </tr>
            `;
        });

        $('#coursesSearchTable tbody').html(tableHTML);
      })
    .fail(()=>{
        console.log('no');
    });

  })
  .keyup();

});
