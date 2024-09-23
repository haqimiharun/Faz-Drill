<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Drilling Report</title>
    <link rel="stylesheet" href="../css/reportViewer.css">
    <style>
        /* Set the size of the page to A4 */
        .report-container-main {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 3mm; /* Optional padding */
            box-sizing: border-box; /* Ensure padding is included in the size */
            background-color: #fff;
            border: 1px solid #000; /* Optional border for visual reference */
            margin-bottom: 10mm; 
        }

        /* Prevent page from being scaled */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .report-container {
                page-break-before: always;
                box-shadow: none;
            }
        }

        /* Optional: Make the content responsive when viewed on screen */
        @media screen {
            body, html {
                height: 100%;
                width: 100%;
            }

            .report-container {
                max-width: 100%;
                height: auto;
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>
<div class="report-container-main">
    <div class="report-container">
        <header>
            <h2>Daily Drilling Report</h2>
        </header>

        <section class="section">
            <div id="well_Info">
                <div class="well">
                    Well: 
                </div>
                <div class="wellbore">
                    Wellbore:
                </div>
                <div class="reportNo">
                    Report No:
                </div>
                <div class="reportDate">
                    Report Date:
                </div>
                <div class="wellTitle">
                    WELL INFO
                </div>
                <div class="eventDesc">
                Event Description:
                </div>
                <div class="waterDepth">
                Water Depth: 
                </div>
                <div class="region">
                Region:
                </div>
                <div class="rigName">
                Rig Name:
                </div>
            </div>
            <div class="sixItem">
                <div class="Obj">
                Objection
                </div>
                <div class="field-platform">
                Field / Platform
                </div>
                <div class="AFE_No">
                AFE No
                </div>
                <div class="Start_date">
                Start date
                </div>
                <div class="Spud_date">
                Spud date
                </div>
                <div class="End_date">
                End date
                </div>
                <div class="blnk">:</div>
                <div class="blnk">:</div>
                <div class="blnk">:</div>
                <div class="blnk">:</div>
                <div class="blnk">:</div>
                <div class="blnk">:</div>
            </div>
            <div id="well_Info">    
                <div class="block">
                Block:
                </div>
                <div class="leadDS">
                Lead DS:
                </div>
                <div class="NightDS">
                Night DS:
                </div>
                <div class="rigName">
                PCSB Engineer:
                </div>
            </div>
            <div id="well_Info2">
                <div class="depthDays">
                    DEPTH DAYS
                </div>
                <div class="Cost">
                    COSTS (USD)
                </div>
                <div class="dol">
                    DOL :
                </div>
                <div class="md">
                    MD :
                </div>
                <div class="rttingHrs">
                    Rotating Hrs :
                </div>
                <div class="lastCasing">
                    Last Casing :
                </div>
                <div class="dailyCost">
                    Daily Cost :
                </div>
                <div class="dfs">
                    DFS :
                </div>
                <div class="tvd">
                    TVD :
                </div>
                <div class="cumRotHrs">
                    Cum Rot Hrs :
                </div>
                <div class="lastHoleSize">
                    Last Hole Size :
                </div>
                <div class="cummCost">
                    Cumm Cost :
                </div>
                <div class="ttlDays">
                    Total Days :
                </div>
                <div class="progress">
                    Progress :
                </div>
                <div class="avgROP">
                    Avg ROP :
                </div>
                <div class="lastShoeTMD">
                    Last Shoe TMD :
                </div>
                <div class="AFECost">
                    AFE Cost :
                </div>
                <div class="estDays">
                    Est days :
                </div>
                <div class="finalTMD">
                    Final TMD :
                </div>
                <div class="blnk1">
                </div>
                <div class="lastShoeTVD">
                    Last Shoe TVD :
                </div>
                <div class="suppCost">
                    Supp Costs / Days :
                </div>
                <div class="dailyNPT">
                    Daily NPT :
                </div>
                <div class="cummNPT">
                    Cumm NPT :
                </div>
                <div class="blnk2">
                    
                </div>
                <div class="curnHoleSize">
                    Current Hole Size :
                </div>
                <div class="expenditure">
                    Expenditure :
                </div>
            </div>
            <div class="wellTitle">
                STATUS
            </div>
            <div id="well_Info3">
                <div class="statusTitle">
                    <div class="currStatus">
                        Current Status
                    </div>
                    <div class="summary">
                        24hr Summary
                    </div>
                    <div class="forecast">
                        24hr Forecast
                    </div>
                    <div class="cident">
                        Incident/Accident
                    </div>
                    <div class="remarks">
                        Remarks
                    </div>
                </div>
                <div class="statusInfo">
                    <div class="currStatus">
                        :
                    </div>
                    <div class="summary">
                        :
                    </div>
                    <div class="forecast">
                        :
                    </div>
                    <div class="cident">
                        :
                    </div>
                    <div class="remarks">
                        :
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="operationSum">
                OPERATION SUMMARY
                <div class="operationSumPart1">
                    <div class="p1">
                        <div class="fromTo">
                            From - To
                        </div> 
                        <div class="hours">
                            Hrs
                        </div> 
                        <div class="phaseCode">
                            Phase Code
                        </div> 
                        <div class="actCode">
                            Activity Code
                        </div>
                        <div class="ductiveCode">
                            Productive Code / Non-Production Code
                        </div> 
                        <div class="NPT">
                            NPT
                        </div>
                        <div class="rigStatus">
                            Rig Status
                        </div>
                        <div class="MDForm">
                            MD Form (m)
                        </div>
                    </div>
                    <div class="p2">
                        Operation
                    </div>
                </div>
            </div>
            <div class="operationSumPart2">
                <div class="p3">
                    <div class="fromTo">
                        
                    </div> 
                    <div class="hours">
                        
                    </div> 
                    <div class="phaseCode">
                        
                    </div> 
                    <div class="actCode">
                        
                    </div>
                    <div class="ductiveCode">
                        
                    </div> 
                    <div class="NPT">
                        
                    </div>
                    <div class="rigStatus">
                    
                    </div>
                    <div class="MDForm">
                        
                    </div>
                </div>
                <div class="p4">
                    
                </div>
            </div>
        </section>
    </div>
    <hr class="hr1">
    <div class="report-container">
        <header>
            <h3>Daily Drilling Report</h3>
        </header>

        <section class="section">
            <div id="well_Info">
                <div class="well">
                    Well: 
                </div>
                <div class="wellbore">
                    Wellbore:
                </div>
                <div class="reportNo">
                    Report No:
                </div>
                <div class="reportDate">
                    Report Date:
                </div>
            </div>
            <div class="a2ndPart">
                <div class="bitData">
                    <div class="bitDataTitle" > BIT DATA
                    </div>
                    <div class="bitData1" > Bit No.
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Run
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Size
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Manufacturer
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Type
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Serial No.
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > TFA
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Cond (IODL)
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Cond (BGOR)
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Jets
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > TMD In
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > TMD Out
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Cum TMD
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > Cum Hrs
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > WOB Min
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > WOB Max
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > RPM Min
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                    <div class="bitData1" > RPM Max
                    </div>
                    <div class="bitData2" > 
                    </div>
                    <div class="bitData3" > 
                    </div>
                </div>
                <div class="mudCheck1">
                    <div class="mudCheck1Title"> MUD CHECK
                    </div>
                    <div class="mudCheck1Cost"> Daily Mud: na USD
                    </div>
                    <div class="mudCheck1_1"> Type
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Time/Loc
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> TMD (m)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Temp (°F)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Density (ppg)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> ECD (ppg)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Viscosity (s/qt)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> PV (cp)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> YP (lbf/100ft²)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Gels (lbf/100ft²)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Api WL (cc/30min)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> HTHP WL (cc/30min)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Api FC (32nd")
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> MBT (lbm/bbl)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> Lime (lbm/bbl)
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                    <div class="mudCheck1_1"> pH
                    </div>
                    <div class="mudCheck1_2"> <br>
                    </div>
                    <div class="mudCheck1_3"> <br>
                    </div>
                </div>
                <div class="mudCheck2">
                    <div class="mudCheck2Title"> MUD CHECK
                    </div>
                    <div class="mudCheck2Cost"> Cum. Mud cost: na USD
                    </div>
                    <div class="mudCheck2_1"> Pm (cc)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Pf/Mf (cc/cc)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Ca+ (ppm)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> K+ (ppm)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Polymer (lbm/bbl)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> CaCl2 (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> NaCl (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Sand (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Tot. Solids (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> % Oil (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> % H20 (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Oil/H20 (%)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> HGSolid (lbm/bbl)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> LGSolid (lbm/bbl)
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> <br>
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                    <div class="mudCheck2_1"> Comments
                    </div>
                    <div class="mudCheck2_2"> <br>
                    </div>
                    <div class="mudCheck2_3"> <br>
                    </div>
                </div>
            </div>
            <div class="bha_part">
                <div class="bha_title1">
                    BHA no.# 2
                </div>
                <div class="bha_title2">
                    Bit no 2
                </div>
                    <div class="bha_data1">
                        Date/Time in
                    </div>
                    <div class="bha_data2">
                        Date/Time Out
                    </div>
                    <div class="bha_data3">
                        Purpose:
                    </div>
                    <div class="bha_data1">
                        BHA Length (m)
                    </div>
                    <div class="bha_data2">
                        Min. ID
                    </div>
                    <div class="bha_data3">
                        Weight (Above/Below) Jars
                    </div>
                </div>
        </section>
    </div>

    
</div>
<div class="report-container-main">
    <div class="report-container">
        <header>
            <h2>Daily Drilling Report</h2>
        </header>

        <section class="section">
            <div id="AC">
                <div class="ACwell">
                    Well: 
                </div>
                <div class="ACwellbore">
                    Wellbore:
                </div>
                <div class="ACreportNo">
                    Report No:
                </div>
                <div class="ACreportDate">
                    Report Date:
                </div>
                <div class="AC_Title">
                    Assembly Components
                </div>
                <div class="sixItem">
                    <div class="Obj">
                    Objection
                    </div>
                    <div class="field-platform">
                    Field / Platform
                    </div>
                    <div class="AFE_No">
                    AFE No
                    </div>
                    <div class="Start_date">
                    Start date
                    </div>
                    <div class="Spud_date">
                    Spud date
                    </div>
                    <div class="End_date">
                    End date
                    </div>
                    <div class="blnk">:</div>
                    <div class="blnk">:</div>
                    <div class="blnk">:</div>
                    <div class="blnk">:</div>
                    <div class="blnk">:</div>
                    <div class="blnk">:</div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
