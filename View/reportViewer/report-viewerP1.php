<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Drilling Report</title>
    <link rel="stylesheet" href="../../css/reportViewer.css">
</head>
<body>
<div class="report-container-main">
    <div class="report-container">
        <header>
            <h2>Daily Drilling Report</h2>
        </header>

        <section class="section">
            <div id="well_Info">
                <div class="well" id="wellDisplay">
                    Well:
                </div>
                <div class="wellbore" id="wellboreDisplay">
                    Wellbore:
                </div>
                <div class="reportNo" id="reportNoDisplay">
                    Report No:
                </div>
                <div class="reportDate" id="reportDateDisplay">
                    Report Date:
                </div>
                <div id="wellInfo" class="wellTitle">
                    WELL INFO
                </div>
                <div id="wi_eventDesc" class="eventDesc">
                Event Description:
                </div>
                <div id="wi_waterDepth" class="waterDepth">
                Water Depth: 
                </div>
                <div id="wi_region" class="region">
                Region:
                </div>
                <div id="wi_rigName" class="rigName">
                Rig Name:
                </div>
            </div>
            <div id="sixItem" class="sixItem">
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
                <div class="blnk" id="wi_Obj_value">:</div>
                <div class="blnk" id="wi_field-platform_value">:</div>
                <div class="blnk" id="wi_AFE_No_value">:</div>
                <div class="blnk" id="wi_Start_date_value">:</div>
                <div class="blnk" id="wi_Spud_date_value">:</div>
                <div class="blnk" id="wi_End_date_value">:</div>
            </div>
            <div id="well_Info">    
                <div id="wi_block" class="block">
                Block:
                </div>
                <div id="wi_leadDS" class="leadDS">
                Lead DS:
                </div>
                <div id="wi_NightDS" class="NightDS">
                Night DS:
                </div>
                <div id="wi_engName" class="engName">
                Engineer:
                </div>
            </div>
            <div id="well_Info2">
                <div id="depthDays" class="depthDays">
                    DEPTH DAYS
                </div>
                <div id="Cost" class="Cost">
                    COSTS (USD)
                </div>
                <div id="dol" class="dol">
                    DOL :
                </div>
                <div id="md" class="md">
                    MD :
                </div>
                <div id="rttingHrs" class="rttingHrs">
                    Rotating Hrs :
                </div>
                <div id="lastCasing" class="lastCasing">
                    Last Casing :
                </div>
                <div id="dailyCost" class="dailyCost">
                    Daily Cost :
                </div>
                <div id="dfs" class="dfs">
                    DFS :
                </div>
                <div id="tvd" class="tvd">
                    TVD :
                </div>
                <div id="cumRotHrs" class="cumRotHrs">
                    Cum Rot Hrs :
                </div>
                <div id="lastHoleSize" class="lastHoleSize">
                    Last Hole Size :
                </div>
                <div id="cummCost" class="cummCost">
                    Cumm Cost :
                </div>
                <div id="ttlDays" class="ttlDays">
                    Total Days :
                </div>
                <div id="progress" class="progress">
                    Progress :
                </div>
                <div id="avgROP" class="avgROP">
                    Avg ROP :
                </div>
                <div id="lastShoeTMD" class="lastShoeTMD">
                    Last Shoe TMD :
                </div>
                <div id="AFECost" class="AFECost">
                    AFE Cost :
                </div>
                <div id="estDays" class="estDays">
                    Est days :
                </div>
                <div id="finalTMD" class="finalTMD">
                    Final TMD :
                </div>
                <div id="blnk1" class="blnk1">
                </div>
                <div id="lastShoeTVD" class="lastShoeTVD">
                    Last Shoe TVD :
                </div>
                <div id="suppCost" class="suppCost">
                    Supp Costs / Days :
                </div>
                <div id="dailyNPT" class="dailyNPT">
                    Daily NPT :
                </div>
                <div id="cummNPT" class="cummNPT">
                    Cumm NPT :
                </div>
                <div id="blnk2" class="blnk2">
                    
                </div>
                <div id="curnHoleSize" class="curnHoleSize">
                    Current Hole Size :
                </div>
                <div id="expenditure" class="expenditure">
                    Expenditure :
                </div>
            </div>
            <div id="statusttl" class="wellTitle">
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
            <div id="operationSum" class="operationSum">
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
            <div id="operationSum2" class="operationSumPart2">
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
</div>
<hr class="hr1">
<script src="../../Controller/report-viewer/report-viewerP1.js"></script>
<script src="http://localhost/Faz-Drill/Controller/reportInformation/report-header.js" defer></script>
<script src="http://localhost/Faz-Drill/Controller/reportInformation/well-data-viewer.js" defer></script>
</body>
</html>
