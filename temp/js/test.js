var orderNo = data.msg['orderNo'];
var form = $("<form action='https://ebank.huidpay.com/payment/v1/order/100000000002824- "+orderNo+" method=post target=_blank'>" +
    "<input type='hidden' name='service' value=''/> " +
    "<input type='hidden' name='paymentType' value=''/> " +
    "<input type='hidden' name='merchantId' value=''/> " +
    "</form> ");