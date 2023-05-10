// Get all print buttons
const printBtns = document.querySelectorAll('.print-btn');

// Loop through each print button
printBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    // Get the table row containing the payment information
    const paymentRow = btn.parentElement.parentElement;
    
    // Get the payment information from the table row
    const paymentID = paymentRow.cells[0].textContent;
    const courseID = paymentRow.cells[1].textContent;
    const studentID = paymentRow.cells[2].textContent;
    const studentName = paymentRow.cells[3].textContent;
    const paymentDate = paymentRow.cells[4].textContent;
    const amount = paymentRow.cells[5].textContent;
    const method = paymentRow.cells[6].textContent;

    // Create a new window to display the PDF
    const win = window.open('', '', 'height=700,width=700');

    // Create the HTML content for the PDF
    const content = `
    <html>
    <head>
        <title>Payment Receipt</title>
        <style>
        
          
        /* Add CSS styles for the PDF */
        body {
          font-family: Arial, sans-serif;
          font-size: 12px;
        }
        .payment-details {
          margin: 20px;
        }
        .payment-details h2 {
          font-size: 16px;
          margin-bottom: 10px;
        }
        .payment-details p {
          margin-bottom: 5px;
        }
        /* Add CSS styles for the PDF */
        body {
          font-family: 'Helvetica Neue', sans-serif;
          font-size: 14px;
          line-height: 1.5;
          color: #333;
          margin: 0;
          padding: 0;
        }

        .payment-details {
          margin: 20px;
          padding: 20px;
          background-color: #f5f5f5;
          border: 1px solid #ddd;
          border-radius: 5px;
        }

        .payment-details h2 {
          font-size: 24px;
          font-weight: 600;
          margin-bottom: 20px;
          color: #333;
        }

        .payment-details p {
          margin-bottom: 10px;
          font-size: 16px;
          color: #666;
        }

        .payment-details strong {
          font-weight: 600;
          color: #333;
        }

            /* Add CSS styles for the PDF */
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                margin: 0;
                padding: 0;
            }
    
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
    
            .receipt {
                width: 400px;
                background-color: #fff;
                border: 1px solid #ddd;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }
    
            .receipt h2 {
                font-size: 20px;
                margin-bottom: 10px;
                text-align: center;
            }
    
            .receipt p {
                font-size: 16px;
                margin-bottom: 5px;
                line-height: 1.5;
            }
    
            .receipt p strong {
                font-weight: bold;
            }
    
        </style>
    </head>
    <body>
    <div class="container">
        <div class="receipt">
            <h2>Payment Receipt</h2>
            <p><strong>Transaction ID:</strong> ${paymentID}</p>
            <p><strong>Class ID:</strong> ${courseID}</p>
            <p><strong>Student ID:</strong> ${studentID}</p>
            <p><strong>Student Name:</strong> ${studentName}</p>
            <p><strong>Payment Date:</strong> ${paymentDate}</p>
            <p><strong>Amount:</strong> ${amount}</p>
            <p><strong>Payment Method:</strong> ${method}</p>
        </div>
    </div>
    </body>
    </html>
    
    `;


    // Set the content of the new window to the HTML content
    win.document.write(content);

    // Print the new window
    win.print();

    // Close the new window
    win.close();
  });
});
