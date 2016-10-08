<center>
<ul class="nav nav-tabs">
  <li><a href="/admin/supplies">SUPPLIES</a></li>
  <li><a href="/admin/recipes">RECIPES</a></li>
  <li><a href="/admin/stock">STOCK</a></li>
  <h2><b>{subtitle}</b></h2>
  <table class="table col-lg-12 col-centered">

  			<tr>
  			<td class="text-center"><b>NAME</b></td><td class="text-center"><b>DESCRIPTION</b></td><td class="text-center"><b>EDIT</b></td><td class="text-center"><b>DELETE</b></td>
  			</tr>
            {recipes}
            <tr>
                <td class="text-center">{name}</td><td class="text-center">{desc}</td><td class="text-center"><a href="receipes/edit/{name}">EDIT</a></td><td class="text-center"><a href="recipes/delete/{name}">DELETE</a></td>
            </tr>
            {/recipes}
        </table>
</ul>
</center>