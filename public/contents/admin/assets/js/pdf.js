window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const resultPdf = this.document.getElementById("result");
            //console.log(invoice);
            //console.log(window);
            var property = {
                margin: 0,
                filename: 'result.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf().from(resultPdf).set(property).save();
        })
}
