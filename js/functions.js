
function addRowHTML(name, php, javascript, css, id, category_id){
	const node = document.getElementById('dataTable');
	const html = `
	<tr id='${id}'>
	<td>${name}</td>
	<td>${php?'PHP':''}<br>
	${javascript?'JavaScript':''}<br>
	${css?'CSS':''}             
	</td>
	<td>
	<button type="button" class="btn btn-danger delete" onclick="deleteRow('${id}','${category_id}')"><svg class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com --></button>
	</td>
	</tr>
	`;
	node.insertAdjacentHTML('beforeend', html);
}

function addRow(name, php, javascript, css){

	$.ajax({
		method:'POST',
		url:'../php/addRow.php',
		data:{name: name, php: php, javascript: javascript, css: css} ,
	}).done(function(response){
		response = JSON.parse(response);
			alert('¡Añadido con éxito!'); 
			addRowHTML(name, php, javascript, css, response.id, response.category_id);
		});
}






function deleteRowHTML(id){
	const node = document.getElementById(id);
	node.querySelectorAll('*').forEach(n => n.remove());
}

function deleteRow(id, idC){

		$.ajax({
			method:'POST',
			url:'../php/deleteRow.php',
			data:{idTask:id, idCategory: idC}
		}).done(function(){
				deleteRowHTML(id);
				alert('¡Eliminado con éxito!'); 

				});
}


