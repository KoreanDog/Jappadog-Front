<div class="row row-centered">
    <div class="table-responsive">
        <a class="btn btn-default" role="button" href="Production/Create">Create a new Recipe</a>
        <table class="table col-lg-12 col-centered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Ingredients</th>
                <th>Price</th>

                <th>Options</th>
            </tr>
            {recipes}
            <tr>
                <td>{name}</td>
                <td>{description}</td>
                <td>
                    {ingredients}
                        {name} <br />
                    {/ingredients}
                </td>
                <td>{price}</td>

                <td>
                    <a class="btn btn-default" role="button" href="Production/EditRecipe/{id}">Edit</a>
                    <a class="btn btn-default" role="button" href="Production/Delete/{id}">Delete</a>
                </td>
            </tr>
            {/recipes}
        </table>
        </ul>
    </div>
</div>

