const fs = require('fs');
const path = require('path');
const xlsx = require('xlsx');

const filePath = 'd:/xampp/htdocs/school_project/boys list.xlsx';
const workbook = xlsx.readFile(filePath);
const sheetName = workbook.SheetNames[0];
const worksheet = workbook.Sheets[sheetName];
// Use header: 1 to get an array of arrays (rows)
const rows = xlsx.utils.sheet_to_json(worksheet, { header: 1 });

const students = rows.filter(row => row.length >= 2).map(row => ({
    reg_no: String(row[0]).trim(),
    name: String(row[1]).trim()
}));

console.log(JSON.stringify(students, null, 2));
