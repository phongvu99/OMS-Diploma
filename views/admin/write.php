<?php

function writeLatex($filename,$row){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, pack("CCC",0xef,0xbb,0xbf)); 
	$str_u = $row[3];	
	echo $univ;
	$text = "\documentclass[a4paper]{article}
	\usepackage{tikz}
	\usepackage{graphicx}
	\usepackage{helvet}
	\\renewcommand{\\familydefault}{\sfdefault}
	\usepackage[vietnamese]{babel}
	\usepackage[top=2cm, bottom=2cm, outer=0cm, inner=0cm]{geometry}
	\begin{document}
	\pagenumbering{gobble}
	\\tikz[remember picture,overlay] \node[opacity=1,inner sep=0pt] at (current page.center){\includegraphics[width=\paperwidth,height=\paperheight]{master.png}};

	\\vspace{7.8cm}
	\begin{center}
	Căn cứ kết quả hoàn thành chương trình đào tạo được xây dựng và hợp tác với các trường đại học Pháp:\\\ ".$str_u;
	fwrite($myfile, $text);
	$text = "\\vspace{0.5cm}
	Advantadging the successful completion of requirements for the study progress developed in partnership\\\ with French universities:". $str_u;
	fwrite($myfile, $text);
	$specialty = $row[4]. " \\\ ". $row[5]; 
	$text = "\\end{center}
	\\vspace{1.1cm}
	\large
	\begin{center}". $specialty." \end{center}
	\hspace{3cm} 
	\\renewcommand{\arraystretch}{1.2}
	\begin{tabular}{l l}";
	fwrite($myfile, $text);
	fclose($myfile);
	
	
	

	$text = "Chuyên ngành & ". $row[6]."\\\ ";
	fwrite($myfile, $text);
	$text = " Specialty & ". $row[7]."\\\ ";
	fwrite($myfile, $text);
	$text = "Xếp loại & ". $row[8]."\\\ ";
	fwrite($myfile, $text);
	$text = " Grade & ". $row[9]."\\\ ";
	fwrite($myfile, $text);
	$text = "Cho & ". $row[10]."\\\ ";
	fwrite($myfile, $text);
	$text = " To & ". $row[11]."\\\ ";
	fwrite($myfile, $text);
	$text = "Sinh ngày & ". $row[12]."\\\ ";
	fwrite($myfile, $text);
	$text = " Born on & ". $row[13]."\\\ ";
	fwrite($myfile, $text);
	$text = "Nơi sinh & ". $row[14]."\\\ ";
	fwrite($myfile, $text);
	$text = " Birth place & ". $row[15]."\\\ ";
	fwrite($myfile, $text);
	$text = "Năm tốt nghiệp & ". $row[16]."\\\ ";
	fwrite($myfile, $text);
	$text = " Graduation year & ". $row[77]."\\\ ";
	fwrite($myfile, $text);
	$text = "\\end{tabular} \\\ ";
	fwrite($myfile, $text);
	$text =	"{\hspace{10.5cm} Hà Nội, ngày 25 tháng 11 năm 2019 \\
		\hspace*{12cm} Hanoi, 25 November 2019 \\
		\hspace*{11.9cm} {\bf HIỆU TRƯỞNG / RECTOR}

		{\\vspace{-1.3cm}
		\hspace{3.4cm} \includegraphics[scale=0.14]{qr.png}}

		{
		\hspace{3.5cm} 
		101001201600001 

		\\vspace{0.3cm}
		\hspace{5.5cm} 
		 001/2019/ĐHKHCN-VB-CN     \hspace{1.9cm} Etienne Saur
		}

		\\end{document}";
	fwrite($myfile, $text);	
}













$text = "
Chuyên ngành & Công nghệ thông tin và Truyền thông \\\
Specialty & Pharmacological, Medical and Agronomical Biotechnology \\\
Xếp loại & Khá \\\
Grade & Average Good \\\
Cho & Nguyễn Văn Quang \\\
To & Nguyen Van Quang \\\
Sinh ngày & 19/01/2000 \\\
Born on & 19/01/2000 \\\
Nơi sinh & Hà Nội, Việt Nam \\\
Birth place & Hanoi, Vietnam \\\
Năm tốt nghiệp & 2019 \\\
Graduation year & 2019 \\\
\\end{tabular}
\\\

{\hspace{10.5cm} Hà Nội, ngày 25 tháng 11 năm 2019 \\
\hspace*{12cm} Hanoi, 25 November 2019 \\
\hspace*{11.9cm} {\bf HIỆU TRƯỞNG / RECTOR}

{\\vspace{-1.3cm}
\hspace{3.4cm} \includegraphics[scale=0.14]{qr.png}}

{
\hspace{3.5cm} 
101001201600001 

\\vspace{0.3cm}
\hspace{5.5cm} 
 001/2019/ĐHKHCN-VB-CN     \hspace{1.9cm} Etienne Saur
}

\\end{document}";
fwrite($myfile, $text);
fclose($myfile);
?>






