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
                        Date/Time in:
                    </div>
                    <div class="bha_data2">
                        Date/Time Out:
                    </div>
                    <div class="bha_data3">
                        Purpose:
                    </div>
                    <div class="bha_data1">
                        BHA Length (m):
                    </div>
                    <div class="bha_data2">
                        Min. ID:
                    </div>
                    <div class="bha_data3">
                        Weight (Above/Below) Jars:
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
                <div class="componentTypeAC">
                    Component type
                </div>
                <div class="NoJointAC">
                    No. of Joints
                </div>
                <div class="LengthAC">
                    Length (m)
                </div>
                <div class="ODAC">
                    OD (in)
                </div>
                <div class="IDAC">
                    ID (in)
                </div>
                <div class="connectionAC">
                    Connection
                </div>
                <div class="weightAC">
                    Weight (ppf)
                </div>
                <div class="GradeAC">
                    Grade
                </div>
                <div class="PinBoxAC">
                    Pin Box
                </div>
                <div class="SerialNoAC">
                    Serial No.
                </div>
                <div class="SpiralAC">
                    Left or right spiral
                </div>
                <div class="fishNetAC">
                    Fish Neck
                </div>
                <div class="conn_OD">
                    OD (in)
                </div>
                <div class="conn_Name">
                    Name
                </div>
                <div class="nf_Length">
                    Length (m)
                </div>
                <div class="nf_OD">
                    OD (in)
                </div>
                <div class="ct1">
                    Dummy 1
                </div>
                <div class="ct1-NoJointAC">
                    
                </div>
                <div class="ct1-LengthAC">
                    
                </div>
                <div class="ct1-ODAC">
                    
                </div>
                <div class="ct1-IDAC">
                    
                </div>
                <div class="ct1-conn_OD">
                    
                </div>
                <div class="ct1-conn_Name">
                    
                </div>
                <div class="ct1-weightAC">
                    
                </div>
                <div class="ct1-GradeAC">
                    
                </div>
                <div class="ct1-PinBoxAC">
                    
                </div>
                <div class="ct1-SerialNoAC">
                    
                </div>
                <div class="ct1-SpiralAC">
                    
                </div>
                <div class="ct1-nf_Length">
                    
                </div>
                <div class="ct1-nf_OD">
                    
                </div>
                <div class="ct2">
                    Dummy 2
                </div>
                <div class="ct2-NoJointAC">
                    
                </div>
                <div class="ct2-LengthAC">
                    
                </div>
                <div class="ct2-ODAC">
                    
                </div>
                <div class="ct2-IDAC">
                    
                </div>
                <div class="ct2-conn_OD">
                    
                </div>
                <div class="ct2-conn_Name">
                    
                </div>
                <div class="ct2-weightAC">
                    
                </div>
                <div class="ct2-GradeAC">
                    
                </div>
                <div class="ct2-PinBoxAC">
                    
                </div>
                <div class="ct2-SerialNoAC">
                    
                </div>
                <div class="ct2-SpiralAC">
                    
                </div>
                <div class="ct2-nf_Length">
                    
                </div>
                <div class="ct2-nf_OD">
                    
                </div>
            </div>
        </section>
        <section class="section">
            <div class="gas_mud">
                <div class="gasReadTitle"> 
                    GAS READING
                </div>
                <div class="mudVolTitle"> 
                    MUD VOLUME
                </div>
                <div class="gasRead">
                    <div class="avgConnGas">
                        Avg. conn. gas (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="avgConnGas_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="ttlStringVol">
                        Total string vol. (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="ttlStringVol_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="mudBuilt">
                        mudBuilt (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="mudBuilt_value">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="maxConnGas">
                        Max. connection gas (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="maxConnGas_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="ttlAnnularVol">
                        Total annular vol. (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="ttlAnnularVol_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="mudSurfaceTtl">
                        Surface Total (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="mudSurfaceTtl_value">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="avgGasTrip">
                        Avg. gas trip (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="avgGasTrip_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="ttlPitVol">
                        Total pit vol. (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="ttlPitVol_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="mudCumSurface">
                        Cum. Surface (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="mudCumSurface_value">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="maxGasTrip">
                        Max. gas trip (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="maxGasTrip_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="lines">
                        Lines (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="lines_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="subSurfaceTtl">
                        Subsurface total (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="subSurfaceTtl_value">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="avgBgGas">
                        Avg. background gas (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="avgBgGas_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank_end">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="mudDumped">
                        Dumped (bbl)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="mudDumped_value">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="maxBgGas">
                        Max. background gas (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="maxBgGas_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank_end">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="avgH2S">
                        Avg. H2S (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="avgH2S_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank_end">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                </div>
                <div class="gasRead">
                    <div class="maxH2S">
                        Max. H2S (%)
                    </div>
                    <div class="eql">
                        :
                    </div>
                    <div class="maxH2S_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="ttlSysVol">
                        Total system vol. (bbl)
                    </div>
                    <div class="eql_systemVol">
                        :
                    </div>
                    <div class="ttlSysVol_value">
                        
                    </div>
                </div>
                <div class="mudRead">
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                    <div class="blank">
                        
                    </div>
                </div>

            </div>
            <div class="pumpPipeVelo">
                <div class="pumpHydraulicTitle">
                    PUMP/HYDRAULICS
                </div>
                <div class="pipeDataTitle">
                    PIPE DATA
                </div>
                <div class="annVeloTitle">
                    ANN. VELOCITIES
                </div>
                <div class="pumpHydraulic">
                    <div class="Pump">
                        Pump
                    </div>
                    <div class="Pump1">
                        
                    </div>
                    <div class="Pump2">
                        
                    </div>
                    <div class="Pump3">
                        
                    </div>
                    <div class="Pump4">
                        
                    </div>
                    <div class="Liner">
                        Liner
                    </div>
                    <div class="Liner1">
                        
                    </div>
                    <div class="Liner2">
                        
                    </div>
                    <div class="Liner3">
                        
                    </div>
                    <div class="Liner4">
                        
                    </div>
                    <div class="Stroke">
                        Stroke
                    </div>
                    <div class="Stroke1">
                        
                    </div>
                    <div class="Stroke2">
                        
                    </div>
                    <div class="Stroke3">
                        
                    </div>
                    <div class="Stroke4">
                        
                    </div>
                    <div class="EFF">
                        EFF
                    </div>
                    <div class="EFF1">
                        
                    </div>
                    <div class="EFF2">
                        
                    </div>
                    <div class="EFF3">
                        
                    </div>
                    <div class="EFF4">
                        
                    </div>
                    <div class="Pressure">
                        Pressure
                    </div>
                    <div class="Pressure1">
                        
                    </div>
                    <div class="Pressure2">
                        
                    </div>
                    <div class="Pressure3">
                        
                    </div>
                    <div class="Pressure4">
                        
                    </div>
                    <div class="SPM">
                        SPM
                    </div>
                    <div class="SPM1">
                        
                    </div>
                    <div class="SPM2">
                        
                    </div>
                    <div class="SPM3">
                        
                    </div>
                    <div class="SPM4">
                        
                    </div>
                    <div class="Output">
                        Output
                    </div>
                    <div class="Output1">
                        
                    </div>
                    <div class="Output2">
                        
                    </div>
                    <div class="Output3">
                        
                    </div>
                    <div class="Output4">
                        
                    </div>
                </div>
                <div class="pipeData">
                    <div class="minID">
                        Min ID (in)
                    </div>
                    <div class="minID_value">
                        
                    </div>
                    <div class="BHA">
                        BHA (m)
                    </div>
                    <div class="BHA_value">
                        
                    </div>
                    <div class="DC_OD">
                        DC OD (in)
                    </div>
                    <div class="DC_OD_value">
                        
                    </div>
                    <div class="DP_OD">
                        DP OD (in)
                    </div>
                    <div class="DP_OD_value">
                        
                    </div>
                    <div class="DC">
                        DC (m)
                    </div>
                    <div class="DC_value">
                        
                    </div>
                    <div class="stringRotWeight">
                        String Rot Weight
                    </div>
                    <div class="stringRotWeight_value">
                        
                    </div>
                    <div class="HWDP_OD">
                        HWDP OD (in)
                    </div>
                    <div class="HWDP_OD_value">
                        
                    </div>
                    <div class="pickUpWeight">
                        Pick-Up Weight
                    </div>
                    <div class="pickUpWeight_value">
                        
                    </div>
                    <div class="HWDP">
                        HWDP (m)
                    </div>
                    <div class="HWDP_value">
                        
                    </div>
                    <div class="slackOffWeight">
                        Slack Off Weight
                    </div>
                    <div class="slackOffWeight_value">
                        
                    </div>
                </div>
                <div class="annVelo">
                    <div class="drillPipe">
                        Drill Pipe (m/min)
                    </div>
                    <div class="drillPipe_value">
                        
                    </div>
                    <div class="drillCollar">
                        Drill Collar (m/min)
                    </div>
                    <div class="drillCollar_value">
                        
                    </div>
                    <div class="riser">
                        Riser (m/min)
                    </div>
                    <div class="riser_value">
                        
                    </div>
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
            <div class="shakerCentrifugeHydrocyclone">
                <div class="shaker">
                    <div class="shakerTitle" > SHAKER
                    </div>
                    <div class="shakerData" >
                        <div class="shakerType" > 
                            Type
                        </div>
                        <div class="shakerMesh" > 
                            Mesh Size
                        </div>
                        <div class="shakerHrs" > 
                            Hrs
                        </div>
                        <div class="shakerTypeValue" > 
                            <br>
                        </div>
                        <div class="shakerMeshValue" > 
                            <br>
                        </div>
                        <div class="shakerHrsValue" > 
                            <br>
                        </div>
                        <div class="shakerTypeValue" > 
                            <br>
                        </div>
                        <div class="shakerMeshValue" > 
                            <br>
                        </div>
                        <div class="shakerHrsValue" > 
                            <br>
                        </div>
                    </div>
                </div>
                <div class="centrifuge">
                    <div class="centrifugeTitle"> CENTRIFUGE
                    </div>
                    <div class="centrifugeData">
                        <div class="centrifugeType"> Type
                        </div>
                        <div class="centrifuge1"> CENTRIFUGE
                        </div>
                        <div class="centrifuge2"> CENTRIFUGE
                        </div>
                        <div class="centrifugeTypeValue" > 
                            <br>
                        </div>
                        <div class="centrifuge1Value" > 
                            <br>
                        </div>
                        <div class="centrifuge2Value" > 
                            <br>
                        </div>
                        <div class="centrifugeTypeValue" > 
                            <br>
                        </div>
                        <div class="centrifuge1Value" > 
                            <br>
                        </div>
                        <div class="centrifuge2Value" > 
                            <br>
                        </div>
                    </div>
                </div>
                <div class="hydrocyclone">
                    <div class="hydrocycloneTitle"> HYDROCYCLONE
                    </div>
                    <div class="hydrocycloneData">
                        <div class="hydrocycloneType"> Type
                        </div>
                        <div class="hydrocycloneHrs"> HRS
                        </div>
                        <div class="hydrocycloneTypeValue"> <br>
                        </div>
                        <div class="hydrocycloneHrsValue"> <br>
                        </div>
                        <div class="hydrocycloneTypeValue"> <br>
                        </div>
                        <div class="hydrocycloneHrsValue"> <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lotfit_fd">
                <div class="LotFit">
                    <div class="LOTFIT_title">
                        LOT/FIT
                    </div>
                    <div class="LotFitData">
                        <div class="EMW">
                            EMW
                        </div>
                        <div class="MAASP">
                            MAASP
                        </div>
                        <div class="maxMudWt">
                            Max Mud Wt
                        </div>
                        <div class="EMWValue">
                            <br>
                        </div>
                        <div class="MAASPValue">
                            
                        </div>
                        <div class="maxMudWtValue">

                        </div>
                    </div>
                </div>
                <div class="formData">
                    <div class="formationData_title">
                        FORMATION DATA
                    </div>
                    <div class="fdData">
                        <div class="fd_formation">
                            Formation
                        </div>
                        <div class="fd_top">
                            Top (m)
                        </div>
                        <div class="fd_formationValue">
                            
                        </div>
                        <div class="fd_topValue">
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>

</div>
</body>
</html>
