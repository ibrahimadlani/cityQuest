
<?php foreach ($_POST["jsonFile"]["results"] as $l) {

?>
    
            <div class="row p-3">
                <div class="col-12  border rounded p-3">
                    <p class="mb-0"><?php echo $_POST["jsonFile"]["results"][0]["formatted_address"]; ?></p>
                    <p class="mb-0 text-secondary"><?php echo $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lat"] . ", " . $_POST["jsonFile"]["results"][0]["geometry"]["location"]["lng"]?></p>
                </div>
            </div>

<?php }?>