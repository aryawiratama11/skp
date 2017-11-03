1. waktu : 100-(R/T*100)
2. biaya : 100-(R/T*100)
3. kuantitas : R/T*100
4. kualitas : R/T*100
5. 1 < 24 : ((1.76*TW-RW)/TW)*100
6. 1 > 24 : 76-((((1,76*TW-RW)/TW)*100)-100)
7. 2 < 24 : ((1.76*TB-RB)/TB)*100
8. 2 > 24 : 76-((((1,76*TB-RB)/TW)*100)-100)
9. waktu if 1 > 24 = 6 else 5
10. biaya if 2 > 24 = 8 else 7
11. penghitungan
	if biaya < 1 = sum 3,4,9
	else biaya > 1 = sum 2,4,9,10
12. nilai capaian skp
	if TB < 1 { if RB < 1 { 11. / 3 } elseif RB > 0 { 11. /4  }} 
	else if (TB > 0) { 11. /4 }