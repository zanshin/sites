<p>Sorry, but that search returned no results. Try again with different search words or phrases.</p>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" style="width:200px;" /> <input type="submit" id="searchsubmit" value="Search Again" />
</div>
</form>
<!--if using the search form in the navbar, you may wish to comment out the form and replace it with suitable text directing searchers back to that search form -->