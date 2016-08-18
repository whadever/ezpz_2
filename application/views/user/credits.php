<div class="row">
	<div class="form-group">
		<label for="">Credit Card Number:</label>
		<input type="text" class="form-control" name="card_number">
	</div>
	<div class="form-group">
		<label for="">Expiry Number:</label>
		<input type="text" class="form-control" name="card_number">
	</div>
</div>

<script src="<?php echo base_url() ?>/js/card.js"></script>

<script>
	var card = new Card({
    // a selector or DOM element for the form where users will
    // be entering their information
    form: 'form', // *required*
    // a selector or DOM element for the container
    // where you want the card to appear
    container: '.card-wrapper', // *required*

    formSelectors: {
        numberInput: 'input#number', // optional — default input[name="number"]
        expiryInput: 'input#expiry', // optional — default input[name="expiry"]
        cvcInput: 'input#cvc', // optional — default input[name="cvc"]
        nameInput: 'input#name' // optional - defaults input[name="name"]
    },

    width: 200, // optional — default 350px
    formatting: true, // optional - default true

    // Strings for translation - optional
    messages: {
        validDate: 'valid\ndate', // optional - default 'valid\nthru'
        monthYear: 'mm/yyyy', // optional - default 'month/year'
    },

    // Default placeholders for rendered fields - optional
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'Full Name',
        expiry: '••/••',
        cvc: '•••'
    },

    // if true, will log helpful messages for setting up Card
    debug: false // optional - default false
});
</script>