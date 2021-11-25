<?php
// Form parts
// ===========================================================================
// These output the content of a form field. If given a value, they do form
// validation on that value. There are probably a bunch of different ways to
// build this. Here's my first stab.
function input_name($value = null){
    $validation = null;

    if(is_null($value)){
        $value = ""; // Default
    } else {
        $validation = validate_name($value);
    }
?>
    <div class="input" hx-target="this" hx-swap="outerHTML" hx-params="name">
        <label for="name">Name:</label>
        <input
            id="name"
            name="name"
            value="<?=$value?>"
            class="<?=validation_class($validation)?>"
            hx-get="/authors/new"
            hx-trigger="input delay:500ms"
        >
        <?=validation_msg($validation)?>
    </div>
<?php }

function input_born($value = null){
?>
    <label for="born">Born (year):</label>
    <input id="born" name="born">
    <br>
<?php }

function input_books($value = null){
?>
    <label for="books">Books (comma-separated):</label>
    <input id="books" name="books">
    <br>
<?php }


// Validation functions and helpers
// ===========================================================================
if (isset($_GET["name"])){ input_name($_GET["name"]); exit; }
if (isset($_GET["born"])){ input_born($_GET["born"]); exit; }
if (isset($_GET["books"])){ input_books($_GET["books"]); exit; }

function validate_name($value){
    if (stripos($value, 'z') !== false){
        return [ 'valid'=>false, 'msg'=>"Must not contain the letter 'Z'." ];
    }
    return [ 'valid'=>true, 'msg'=>"Name looks good!" ];
}
function validate_born($value){

}
function validate_books($value){

}

function validation_class($validation){
    if ($validation){
        return $validation['valid'] ? "valid" : "invalid";
    }
    return "";
}

function validation_msg($validation){
    if ($validation){
        $vclass = validation_class($validation);
        return "<span class=\"validation $vclass\">${validation['msg']}</span>";
    }
    return "";
}


// New book submitted, pretend we stored it
// ===========================================================================
if ($method === 'POST'):
?>

<h1>Author Added!</h1>
<p>Congratulations! Your new author entry has been carefully placed in the collection.</p>
<p>(<strong>Not really!</strong> Sorry, this is just a demo.)</p>

<?php

// Show new author form
// ===========================================================================
else:
?>

<h1>Add an Author</h1>
<p>Please don't put too much effort into this info. It won't actually be saved!</p>
<form method="post" action="/authors">
    <?php
    input_name();
    input_born();
    input_books();
    ?>
    <input type="submit">
</form>

<?php
endif;
