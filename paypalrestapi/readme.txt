1.
curl https://api.sandbox.paypal.com/v1/oauth2/token \
   -H "Accept: application/json" \
   -H "Accept-Language: en_US" \
   -u "Abyu86MGIVUb-2AZdvjSWcX_5wMrCk3reYm5-xxVPD7VQi30vUQuTiPHjPyDqQKCoaKxaFTZBFNSX5tR:EA743tgTGBONY5_skgCGBU7XGBcFfEzE0rzL_KyRT9SPmD2GVxgBQJV_0SM66IN1oEVzHKWVSj1Dfkfv" \
   -d "grant_type=client_credentials"

-u clientid:secretkey

2.
curl -X POST https://api.sandbox.paypal.com/v1/payments/payment \
-H "Content-Type:application/json" \
-H "Authorization: Bearer A21AAGa67TwnD-HqgB_pUxsIHo0WFoEpS16J46bgVGo2Ms1uVb_tSn_HcsrB30t1EfQypwYqB4ZtX_vQ3nvZAumM0qcmBMgcw" \
-d '{
  "intent": "sale",
  "payer": {
    "payment_method": "paypal"
  },
  "transactions": [
  {
    "amount": {
    "total": "30.11",
    "currency": "INR",
    "details": {
      "subtotal": "30.00",
      "tax": "0.07",
      "shipping": "0.03",
      "handling_fee": "1.00",
      "shipping_discount": "-1.00",
      "insurance": "0.01"
    }
    },
    "description": "The payment transaction description.",
    "custom": "EBAY_EMS_90048630024435",
    "invoice_number": "avadhesh1121",
    "payment_options": {
    "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
    },
    "soft_descriptor": "ECHI5786786",
    "item_list": {
    "items": [
      {
      "name": "hat",
      "description": "Brown hat.",
      "quantity": "5",
      "price": "3",
      "tax": "0.01",
      "sku": "1",
      "currency": "INR"
      },
      {
      "name": "handbag",
      "description": "Black handbag.",
      "quantity": "1",
      "price": "15",
      "tax": "0.02",
      "sku": "product34",
      "currency": "INR"
      }
    ],
    "shipping_address": {
      "recipient_name": "Brian Robinson",
      "line1": "4th Floor",
      "line2": "Unit #34",
      "city": "San Jose",
      "country_code": "US",
      "postal_code": "95131",
      "phone": "011862212345678",
      "state": "CA"
    }
    }
  }
  ],
  "note_to_payer": "Contact us for any questions on your order.",
  "redirect_urls": {
  "return_url": "http://localhost/paypalrestapi/return.php",
  "cancel_url": "http://localhost/paypalrestapi/cancel.php"
  }
}'

-H Tocket generated in step 1


execute : https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-2RW27905BF3155518 -- will redirect to paypal site


3.
curl -X POST https://api.sandbox.paypal.com/v1/payments/payment/PAY-1DP056104J716154JLKFF5NA/execute \
-H "Content-Type:application/json" \
-H "Authorization: Bearer A21AAGa67TwnD-HqgB_pUxsIHo0WFoEpS16J46bgVGo2Ms1uVb_tSn_HcsrB30t1EfQypwYqB4ZtX_vQ3nvZAumM0qcmBMgcw" \
-d '{
  "payer_id": "N4UYWA3ZZ5RPQ"
}'



curl -X GET https://api.sandbox.paypal.com/v1/payments/payment/PAY-10943348X6478515LLJJV5PA




http://pepperfry-ep:8101/AXUATWrapperService/AxEcomWrapper.svc/createVendorInvoiceDetails


customer 
===========
shaily.a@pepperfry.com/12345678


merchant
=====================
avadhesh.project@gmail.com/mishra@pf






https://api.paypal.com/v1/payments/sale/1VW25779XD444213G