<button class="myBtn" href="">ddddddddddd</button>
<div class="myModal modal">
    <form method="post" action="../thanks" class="modal-content feedback">
        <h3>Informacje zwrotne</h3>
        <span class="feedback-close">×</span>
        <input type="text" name="nomo" placeholder="Imię" class="feedback-input">
        <input type="text" name="telefono" placeholder="Telefon" class="feedback-input">
        <input type="text" name="posto" placeholder="E-mail" class="feedback-input">
        <input type="text" name="topic" placeholder="Temat" class="feedback-input">
        <textarea name="mesago" placeholder="Wiadomość" class="feedback-textarea"></textarea>
        <input type="hidden" name="formo" value="Модальная форма">
        <input type="hidden" name="pago"
                value="<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
        <div class="form-row-checked">
            <input type="checkbox" required="" id="aboutusChecked" class="form-checkbox" value="true">
            <label for="aboutusChecked"
                    class="form-label">Wyrażam zgodę na przetwarzanie danych w zakresie adresu e-mail w celach marketingowych Randstad Polska Sp. z&nbsp;o.o. z&nbsp;siedzibą w&nbsp;Warszawie, Aleje Jerozolimskie 134 tj. otrzymywanie informacji handlowych drogą elektroniczną</label>
        </div>
        <input type="submit" class="btn feedback-btn" value="wysłać">
    </form>
</div>

<style>
    .modal{
    display:none; /* Hidden by default */
    position:fixed; /* Stay in place */
    justify-content:center;
    align-items:center;
    z-index:1001; /* Sit on top */
    left:0;
    top:0;
    height:100%;
    width:100%;
    /* Full width */
    background-color:rgb(0, 0, 0); /* Fallback color */
    background-color:rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}
.modal-content{
    background-color:#fefefe;
    margin:auto;
    padding:20px;
    border:1px solid #888;
    width:80%;
}

.feedback{
    display:flex;
    flex-flow:row wrap;
    justify-content:space-between;
    width:600px;
    background:#fff;
    padding:30px;
    /*margin:100px auto 0px;*/
    box-shadow:0px 0px 15px rgba(0, 0, 0, 0.7);
    position:relative;
    /*top:100%;*/
    transition:0.3s;
    overflow:hidden;
}

.feedback > h3{
    width:100%;
    font-size:21px;
    text-transform:uppercase;
    letter-spacing:0.05em;
    text-align:center;
    margin:0px 0px 25px;
    line-height:1;
    font-weight:600;}

.feedback .feedback-close{
    position:absolute;
    font-size:32px;
    padding:0px;
    font-family:serif;
    background:none;
    border:0px;
    width:37px;
    height:37px;
    right:30px;
    text-align:right;
    top:22px;
    transition:0.3s;
    cursor:pointer;
    z-index:999;
}

.feedback .feedback-input{
    width:48.5%;
    display:inline-block;
    height:40px;
    text-align:center;
    border:1px solid #ddd;
    letter-spacing:0.03em;
    margin-bottom:10px;
    /*margin:0px 3% 15px 0px;*/
}

.feedback .feedback-textarea{
    width:100%;
    border:1px solid #ddd;
    padding:20px;
    letter-spacing:0.03em;
    min-width:100%;
    max-width:100%;
    height:100px;
    min-height:100%;
    max-height:100%;
    margin:0px 0px 20px;
}

.feedback .feedback-btn{
    display:block;
    margin:20px auto 0;
    height:40px;
    padding:0px 25px;
    font-size:13px;
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:0.025em;
    border:0px;
    background:#49ab15;
    color:#fff;
    transition:0.3s;
    cursor:pointer;
    box-shadow:0px 0px 15px rgba(0, 0, 0, 0.15);
    line-height:40px;
    vertical-align:middle;
    text-decoration:none;
}
</style>
<script>

// Get the modal
var modal = document.getElementsByClassName('myModal')[0];

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn")[0];

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("feedback-close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
    modal.style.display = "flex";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>