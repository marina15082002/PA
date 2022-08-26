import { jsPDF } from "jspdf";

function pdf() {
    var doc = new jsPDF();
    doc.text(20, 20, 'Hello world!');
    doc.save('a4.pdf');
}
