<style>
    .containerRadio {
        direction: rtl;
        display: block;
        position: relative;
        padding-right: 35px;
        padding-bottom: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        font-size: 18px;
        font-weight: 500;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border-bottom: 1px solid #ccc;
        width: 100%;
    }

    /* Hide the browser's default radio button */

    .containerRadio input {
        position: absolute;
        opacity: 0;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        right: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */

    .containerRadio:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .containerRadio input:checked ~ .checkmark {
        background-color: #13c934;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */

    /* Show the indicator (dot/circle) when checked */
    .containerRadio input:checked ~ .checkmark:after {
        display: block;
    }
</style>
<fieldset id='group$i' style="width: 50%">
    <label class='containerRadio'>فرامل
        <input type='radio' class='selector$i' name='selector$i' value='فرامل' >
        <span class='checkmark'></span>
    </label>
    <label class='containerRadio'>رفع قدم عن الوقود
        <input type='radio' class='selector$i' name='selector$i' value='رفع قدم عن الوقود'>
        <span class='checkmark'></span>
    </label>
    <label class='containerRadio'>لا شئ
        <input type='radio' class='selector$i' name='selector$i' value='لا شئ' checked>
        <span class='checkmark'></span>
    </label>
</fieldset>

