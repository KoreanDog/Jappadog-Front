<div class="row row-centered">

    <form action="/Production/CreateRecipe" method="post">
        {name}
        {description}
        {price}

        {ingredients}
        {checkbox} - {name} <br />
        {/ingredients}


        <button class="btn btn-success" role="button" type="submit">Save</button>
        <a class="btn btn-default" role="button" href="/Production">Cancel</a>

    </form>

</div>

