<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cashfree Checkout Integration</title>
        <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
    </head>
    <body>
        <div class="row" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
            <p style="    font-family: Roboto, Ariel, sans-serif;
">Click below to open the checkout page in current tab</p>
            <button id="renderBtn" style="    border: none;
    background: orange;
    padding: 12px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;font-weight:700">Pay Now</button>
        </div>
       @if(Session::has('payment_session_id'))
    <script>
     const cashfree = Cashfree({
                mode: "sandbox",
            });
            document.getElementById("renderBtn").addEventListener("click", () => {
                let checkoutOptions = {
                    paymentSessionId: "{{session('payment_session_id')}}",
                    redirectTarget: "_self",
                };
                cashfree.checkout(checkoutOptions);
            });
    </script>
    <?php Session::forget('payment_session_id'); ?>
@endif
    </body>
</html>