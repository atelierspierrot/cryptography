(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '    <ul>                <li data-name="namespace:Cryptography" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography.html">Cryptography</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:Cryptography_Analysis" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/Analysis.html">Analysis</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Cryptography_Analysis_AbstractAnalyzer" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Analysis/AbstractAnalyzer.html">AbstractAnalyzer</a>                    </div>                </li>                            <li data-name="class:Cryptography_Analysis_Frequency" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Analysis/Frequency.html">Frequency</a>                    </div>                </li>                            <li data-name="class:Cryptography_Analysis_Position" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Analysis/Position.html">Position</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Cryptography_Preset" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/Preset.html">Preset</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Cryptography_Preset_AtbashCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/AtbashCipher.html">AtbashCipher</a>                    </div>                </li>                            <li data-name="class:Cryptography_Preset_BealeCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/BealeCipher.html">BealeCipher</a>                    </div>                </li>                            <li data-name="class:Cryptography_Preset_CaesarCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/CaesarCipher.html">CaesarCipher</a>                    </div>                </li>                            <li data-name="class:Cryptography_Preset_CryptedCracker" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/CryptedCracker.html">CryptedCracker</a>                    </div>                </li>                            <li data-name="class:Cryptography_Preset_PolybeSquareCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/PolybeSquareCipher.html">PolybeSquareCipher</a>                    </div>                </li>                            <li data-name="class:Cryptography_Preset_VigenereCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Preset/VigenereCipher.html">VigenereCipher</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Cryptography_SubstitutionCipher" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/SubstitutionCipher.html">SubstitutionCipher</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Cryptography_SubstitutionCipher_AbstractSubstitutionCipher" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html">AbstractSubstitutionCipher</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_AbstractSubstitutionCipherPreset" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html">AbstractSubstitutionCipherPreset</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Affine" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Affine.html">Affine</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Book" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Book.html">Book</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Homophonic" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Homophonic.html">Homophonic</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Inversion" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Inversion.html">Inversion</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_PolyAlphabetic" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/PolyAlphabetic.html">PolyAlphabetic</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Repertory" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Repertory.html">Repertory</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Rotation" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Rotation.html">Rotation</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Simple" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Simple.html">Simple</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionCipher_Square" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionCipher/Square.html">Square</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Cryptography_SubstitutionTable" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/SubstitutionTable.html">SubstitutionTable</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Cryptography_SubstitutionTable_AbstractSubstitutionTable" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/AbstractSubstitutionTable.html">AbstractSubstitutionTable</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_Closure" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/Closure.html">Closure</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_Keyword" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/Keyword.html">Keyword</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_Rotary" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/Rotary.html">Rotary</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_Simple" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/Simple.html">Simple</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_Square" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/Square.html">Square</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_TabulaRecta" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/TabulaRecta.html">TabulaRecta</a>                    </div>                </li>                            <li data-name="class:Cryptography_SubstitutionTable_TextRepertory" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/SubstitutionTable/TextRepertory.html">TextRepertory</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Cryptography_Tools" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/Tools.html">Tools</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:Cryptography_Tools_RainbowTable" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Cryptography/Tools/RainbowTable.html">RainbowTable</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:Cryptography_Tools_RainbowTable_FileGenerator" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Cryptography/Tools/RainbowTable/FileGenerator.html">FileGenerator</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Cryptography_Tools_RainbowTableGenerator" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Tools/RainbowTableGenerator.html">RainbowTableGenerator</a>                    </div>                </li>                            <li data-name="class:Cryptography_Tools_StringBuilder" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Tools/StringBuilder.html">StringBuilder</a>                    </div>                </li>                            <li data-name="class:Cryptography_Tools_StringCracker" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Cryptography/Tools/StringCracker.html">StringCracker</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Cryptography_Cryptography" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Cryptography/Cryptography.html">Cryptography</a>                    </div>                </li>                            <li data-name="class:Cryptography_Helper" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="Cryptography/Helper.html">Helper</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    {"type": "Namespace", "link": "Cryptography.html", "name": "Cryptography", "doc": "Namespace Cryptography"},{"type": "Namespace", "link": "Cryptography/Analysis.html", "name": "Cryptography\\Analysis", "doc": "Namespace Cryptography\\Analysis"},{"type": "Namespace", "link": "Cryptography/Preset.html", "name": "Cryptography\\Preset", "doc": "Namespace Cryptography\\Preset"},{"type": "Namespace", "link": "Cryptography/SubstitutionCipher.html", "name": "Cryptography\\SubstitutionCipher", "doc": "Namespace Cryptography\\SubstitutionCipher"},{"type": "Namespace", "link": "Cryptography/SubstitutionTable.html", "name": "Cryptography\\SubstitutionTable", "doc": "Namespace Cryptography\\SubstitutionTable"},{"type": "Namespace", "link": "Cryptography/Tools.html", "name": "Cryptography\\Tools", "doc": "Namespace Cryptography\\Tools"},{"type": "Namespace", "link": "Cryptography/Tools/RainbowTable.html", "name": "Cryptography\\Tools\\RainbowTable", "doc": "Namespace Cryptography\\Tools\\RainbowTable"},
            
            {"type": "Class", "fromName": "Cryptography\\Analysis", "fromLink": "Cryptography/Analysis.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html", "name": "Cryptography\\Analysis\\AbstractAnalyzer", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Analysis\\AbstractAnalyzer", "fromLink": "Cryptography/Analysis/AbstractAnalyzer.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html#method___construct", "name": "Cryptography\\Analysis\\AbstractAnalyzer::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Analysis\\AbstractAnalyzer", "fromLink": "Cryptography/Analysis/AbstractAnalyzer.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html#method_setAnalysisType", "name": "Cryptography\\Analysis\\AbstractAnalyzer::setAnalysisType", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Analysis\\AbstractAnalyzer", "fromLink": "Cryptography/Analysis/AbstractAnalyzer.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html#method_setAllowedCharacters", "name": "Cryptography\\Analysis\\AbstractAnalyzer::setAllowedCharacters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Analysis\\AbstractAnalyzer", "fromLink": "Cryptography/Analysis/AbstractAnalyzer.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html#method_prepareString", "name": "Cryptography\\Analysis\\AbstractAnalyzer::prepareString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Analysis\\AbstractAnalyzer", "fromLink": "Cryptography/Analysis/AbstractAnalyzer.html", "link": "Cryptography/Analysis/AbstractAnalyzer.html#method_process", "name": "Cryptography\\Analysis\\AbstractAnalyzer::process", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Analysis", "fromLink": "Cryptography/Analysis.html", "link": "Cryptography/Analysis/Frequency.html", "name": "Cryptography\\Analysis\\Frequency", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Analysis\\Frequency", "fromLink": "Cryptography/Analysis/Frequency.html", "link": "Cryptography/Analysis/Frequency.html#method_process", "name": "Cryptography\\Analysis\\Frequency::process", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Analysis", "fromLink": "Cryptography/Analysis.html", "link": "Cryptography/Analysis/Position.html", "name": "Cryptography\\Analysis\\Position", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Analysis\\Position", "fromLink": "Cryptography/Analysis/Position.html", "link": "Cryptography/Analysis/Position.html#method_process", "name": "Cryptography\\Analysis\\Position::process", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography", "fromLink": "Cryptography.html", "link": "Cryptography/Cryptography.html", "name": "Cryptography\\Cryptography", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Cryptography", "fromLink": "Cryptography/Cryptography.html", "link": "Cryptography/Cryptography.html#method_getAllCharacters", "name": "Cryptography\\Cryptography::getAllCharacters", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography", "fromLink": "Cryptography.html", "link": "Cryptography/Helper.html", "name": "Cryptography\\Helper", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_tableToString", "name": "Cryptography\\Helper::tableToString", "doc": "&quot;Table to string renderer&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_randomize", "name": "Cryptography\\Helper::randomize", "doc": "&quot;Randomize an input string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_rotate", "name": "Cryptography\\Helper::rotate", "doc": "&quot;Rotate an input string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_testCase", "name": "Cryptography\\Helper::testCase", "doc": "&quot;Case tester&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_homogenizeString", "name": "Cryptography\\Helper::homogenizeString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_sanitizeString", "name": "Cryptography\\Helper::sanitizeString", "doc": "&quot;This will clean a string keeping only the characters in &lt;code&gt;$allowed&lt;\/code&gt;&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Helper", "fromLink": "Cryptography/Helper.html", "link": "Cryptography/Helper.html#method_stripSpaces", "name": "Cryptography\\Helper::stripSpaces", "doc": "&quot;Strip spaces in a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/AtbashCipher.html", "name": "Cryptography\\Preset\\AtbashCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\AtbashCipher", "fromLink": "Cryptography/Preset/AtbashCipher.html", "link": "Cryptography/Preset/AtbashCipher.html#method___construct", "name": "Cryptography\\Preset\\AtbashCipher::__construct", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/BealeCipher.html", "name": "Cryptography\\Preset\\BealeCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\BealeCipher", "fromLink": "Cryptography/Preset/BealeCipher.html", "link": "Cryptography/Preset/BealeCipher.html#method___construct", "name": "Cryptography\\Preset\\BealeCipher::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\BealeCipher", "fromLink": "Cryptography/Preset/BealeCipher.html", "link": "Cryptography/Preset/BealeCipher.html#method_crypt", "name": "Cryptography\\Preset\\BealeCipher::crypt", "doc": "&quot;Crypt a string with the preset&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\BealeCipher", "fromLink": "Cryptography/Preset/BealeCipher.html", "link": "Cryptography/Preset/BealeCipher.html#method_decrypt", "name": "Cryptography\\Preset\\BealeCipher::decrypt", "doc": "&quot;Decrypt a string with the preset&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/CaesarCipher.html", "name": "Cryptography\\Preset\\CaesarCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\CaesarCipher", "fromLink": "Cryptography/Preset/CaesarCipher.html", "link": "Cryptography/Preset/CaesarCipher.html#method___construct", "name": "Cryptography\\Preset\\CaesarCipher::__construct", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/CryptedCracker.html", "name": "Cryptography\\Preset\\CryptedCracker", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\CryptedCracker", "fromLink": "Cryptography/Preset/CryptedCracker.html", "link": "Cryptography/Preset/CryptedCracker.html#method___construct", "name": "Cryptography\\Preset\\CryptedCracker::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\CryptedCracker", "fromLink": "Cryptography/Preset/CryptedCracker.html", "link": "Cryptography/Preset/CryptedCracker.html#method_setCryptedString", "name": "Cryptography\\Preset\\CryptedCracker::setCryptedString", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\CryptedCracker", "fromLink": "Cryptography/Preset/CryptedCracker.html", "link": "Cryptography/Preset/CryptedCracker.html#method_processAllHashes", "name": "Cryptography\\Preset\\CryptedCracker::processAllHashes", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/PolybeSquareCipher.html", "name": "Cryptography\\Preset\\PolybeSquareCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\PolybeSquareCipher", "fromLink": "Cryptography/Preset/PolybeSquareCipher.html", "link": "Cryptography/Preset/PolybeSquareCipher.html#method___construct", "name": "Cryptography\\Preset\\PolybeSquareCipher::__construct", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Preset", "fromLink": "Cryptography/Preset.html", "link": "Cryptography/Preset/VigenereCipher.html", "name": "Cryptography\\Preset\\VigenereCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Preset\\VigenereCipher", "fromLink": "Cryptography/Preset/VigenereCipher.html", "link": "Cryptography/Preset/VigenereCipher.html#method___construct", "name": "Cryptography\\Preset\\VigenereCipher::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\VigenereCipher", "fromLink": "Cryptography/Preset/VigenereCipher.html", "link": "Cryptography/Preset/VigenereCipher.html#method_setPlaintextKey", "name": "Cryptography\\Preset\\VigenereCipher::setPlaintextKey", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\VigenereCipher", "fromLink": "Cryptography/Preset/VigenereCipher.html", "link": "Cryptography/Preset/VigenereCipher.html#method_setUserKey", "name": "Cryptography\\Preset\\VigenereCipher::setUserKey", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\VigenereCipher", "fromLink": "Cryptography/Preset/VigenereCipher.html", "link": "Cryptography/Preset/VigenereCipher.html#method_crypt", "name": "Cryptography\\Preset\\VigenereCipher::crypt", "doc": "&quot;Crypt a string with the preset&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Preset\\VigenereCipher", "fromLink": "Cryptography/Preset/VigenereCipher.html", "link": "Cryptography/Preset/VigenereCipher.html#method_decrypt", "name": "Cryptography\\Preset\\VigenereCipher::decrypt", "doc": "&quot;Decrypt a string with the preset&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html#method_setSubstitutionTable", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher::setSubstitutionTable", "doc": "&quot;Define the cipher substitution table object&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher::getSubstitutionTable", "doc": "&quot;Retrieve the cipher substitution object&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html#method_setFlag", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher::setFlag", "doc": "&quot;Define the behavior flag of the object&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipher.html#method_process", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipher::process", "doc": "&quot;Generic method to dispatch the \&quot;to do\&quot; action&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipherPreset", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipherPreset", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipherPreset::crypt", "doc": "&quot;Crypt a string with the preset&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipherPreset", "fromLink": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html", "link": "Cryptography/SubstitutionCipher/AbstractSubstitutionCipherPreset.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\AbstractSubstitutionCipherPreset::decrypt", "doc": "&quot;Decrypt a string with the preset&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Affine.html", "name": "Cryptography\\SubstitutionCipher\\Affine", "doc": "&quot;This use an affine function to calculate the cipher encoding:&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Affine", "fromLink": "Cryptography/SubstitutionCipher/Affine.html", "link": "Cryptography/SubstitutionCipher/Affine.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Affine::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Affine", "fromLink": "Cryptography/SubstitutionCipher/Affine.html", "link": "Cryptography/SubstitutionCipher/Affine.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Affine::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Affine", "fromLink": "Cryptography/SubstitutionCipher/Affine.html", "link": "Cryptography/SubstitutionCipher/Affine.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Affine::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Book.html", "name": "Cryptography\\SubstitutionCipher\\Book", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Book::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_setScopeFlag", "name": "Cryptography\\SubstitutionCipher\\Book::setScopeFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_setOccurrenceFlag", "name": "Cryptography\\SubstitutionCipher\\Book::setOccurrenceFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_setCharacterFlag", "name": "Cryptography\\SubstitutionCipher\\Book::setCharacterFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionCipher\\Book::substitutionTableToString", "doc": "&quot;Debugging the substitution table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Book::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Book", "fromLink": "Cryptography/SubstitutionCipher/Book.html", "link": "Cryptography/SubstitutionCipher/Book.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Book::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Homophonic.html", "name": "Cryptography\\SubstitutionCipher\\Homophonic", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Homophonic", "fromLink": "Cryptography/SubstitutionCipher/Homophonic.html", "link": "Cryptography/SubstitutionCipher/Homophonic.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Homophonic::__construct", "doc": "&quot;The keys here must be defined as an array like:&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Homophonic", "fromLink": "Cryptography/SubstitutionCipher/Homophonic.html", "link": "Cryptography/SubstitutionCipher/Homophonic.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionCipher\\Homophonic::substitutionTableToString", "doc": "&quot;Debugging the substitution table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Homophonic", "fromLink": "Cryptography/SubstitutionCipher/Homophonic.html", "link": "Cryptography/SubstitutionCipher/Homophonic.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Homophonic::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Homophonic", "fromLink": "Cryptography/SubstitutionCipher/Homophonic.html", "link": "Cryptography/SubstitutionCipher/Homophonic.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Homophonic::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Inversion.html", "name": "Cryptography\\SubstitutionCipher\\Inversion", "doc": "&quot;Inversion substitution: \&quot;Atbash cipher\&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Inversion", "fromLink": "Cryptography/SubstitutionCipher/Inversion.html", "link": "Cryptography/SubstitutionCipher/Inversion.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Inversion::__construct", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/PolyAlphabetic.html", "name": "Cryptography\\SubstitutionCipher\\PolyAlphabetic", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\PolyAlphabetic", "fromLink": "Cryptography/SubstitutionCipher/PolyAlphabetic.html", "link": "Cryptography/SubstitutionCipher/PolyAlphabetic.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\PolyAlphabetic::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\PolyAlphabetic", "fromLink": "Cryptography/SubstitutionCipher/PolyAlphabetic.html", "link": "Cryptography/SubstitutionCipher/PolyAlphabetic.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionCipher\\PolyAlphabetic::substitutionTableToString", "doc": "&quot;Debugging the substitution table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\PolyAlphabetic", "fromLink": "Cryptography/SubstitutionCipher/PolyAlphabetic.html", "link": "Cryptography/SubstitutionCipher/PolyAlphabetic.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\PolyAlphabetic::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\PolyAlphabetic", "fromLink": "Cryptography/SubstitutionCipher/PolyAlphabetic.html", "link": "Cryptography/SubstitutionCipher/PolyAlphabetic.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\PolyAlphabetic::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Repertory.html", "name": "Cryptography\\SubstitutionCipher\\Repertory", "doc": "&quot;The keys here must be defined as an array like:&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Repertory", "fromLink": "Cryptography/SubstitutionCipher/Repertory.html", "link": "Cryptography/SubstitutionCipher/Repertory.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionCipher\\Repertory::substitutionTableToString", "doc": "&quot;Debugging the substitution table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Repertory", "fromLink": "Cryptography/SubstitutionCipher/Repertory.html", "link": "Cryptography/SubstitutionCipher/Repertory.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Repertory::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Repertory", "fromLink": "Cryptography/SubstitutionCipher/Repertory.html", "link": "Cryptography/SubstitutionCipher/Repertory.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Repertory::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Rotation.html", "name": "Cryptography\\SubstitutionCipher\\Rotation", "doc": "&quot;Rotation substitution: \&quot;Caesar cipher\&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Rotation", "fromLink": "Cryptography/SubstitutionCipher/Rotation.html", "link": "Cryptography/SubstitutionCipher/Rotation.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Rotation::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Rotation", "fromLink": "Cryptography/SubstitutionCipher/Rotation.html", "link": "Cryptography/SubstitutionCipher/Rotation.html#method_rot13", "name": "Cryptography\\SubstitutionCipher\\Rotation::rot13", "doc": "&quot;Shortcut or &lt;code&gt;ROT13&lt;\/code&gt;&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Simple.html", "name": "Cryptography\\SubstitutionCipher\\Simple", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Simple", "fromLink": "Cryptography/SubstitutionCipher/Simple.html", "link": "Cryptography/SubstitutionCipher/Simple.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Simple::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Simple", "fromLink": "Cryptography/SubstitutionCipher/Simple.html", "link": "Cryptography/SubstitutionCipher/Simple.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionCipher\\Simple::substitutionTableToString", "doc": "&quot;Debugging the substitution table used&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Simple", "fromLink": "Cryptography/SubstitutionCipher/Simple.html", "link": "Cryptography/SubstitutionCipher/Simple.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Simple::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Simple", "fromLink": "Cryptography/SubstitutionCipher/Simple.html", "link": "Cryptography/SubstitutionCipher/Simple.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Simple::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionCipher", "fromLink": "Cryptography/SubstitutionCipher.html", "link": "Cryptography/SubstitutionCipher/Square.html", "name": "Cryptography\\SubstitutionCipher\\Square", "doc": "&quot;Square substitution: \&quot;Polybe square cipher\&quot; like&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Square", "fromLink": "Cryptography/SubstitutionCipher/Square.html", "link": "Cryptography/SubstitutionCipher/Square.html#method___construct", "name": "Cryptography\\SubstitutionCipher\\Square::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Square", "fromLink": "Cryptography/SubstitutionCipher/Square.html", "link": "Cryptography/SubstitutionCipher/Square.html#method_crypt", "name": "Cryptography\\SubstitutionCipher\\Square::crypt", "doc": "&quot;Crypt a string&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionCipher\\Square", "fromLink": "Cryptography/SubstitutionCipher/Square.html", "link": "Cryptography/SubstitutionCipher/Square.html#method_decrypt", "name": "Cryptography\\SubstitutionCipher\\Square::decrypt", "doc": "&quot;Decrypt a string&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method___construct", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::__construct", "doc": "&quot;Load the plain text key and substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_setPlaintextKey", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::setPlaintextKey", "doc": "&quot;Define the plain text key&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_setSubstitutions", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::setSubstitutions", "doc": "&quot;Define the substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_addSubstitution", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::addSubstitution", "doc": "&quot;Add an entry to the substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::substitutionTableToString", "doc": "&quot;Debugging the substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_getPlaintextKey", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::getPlaintextKey", "doc": "&quot;Must return the original plain text key&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_getSubstitutions", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::getSubstitutions", "doc": "&quot;Must return the substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable", "fromLink": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html", "link": "Cryptography/SubstitutionTable/AbstractSubstitutionTable.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\AbstractSubstitutionTable::getSubstitutionTable", "doc": "&quot;Must return a table of correspondence between plain text key and substitutions items&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/Closure.html", "name": "Cryptography\\SubstitutionTable\\Closure", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method___construct", "name": "Cryptography\\SubstitutionTable\\Closure::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method_setCryptClosure", "name": "Cryptography\\SubstitutionTable\\Closure::setCryptClosure", "doc": "&quot;Define the encryption closure&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method_setDecryptClosure", "name": "Cryptography\\SubstitutionTable\\Closure::setDecryptClosure", "doc": "&quot;Define the decryption closure&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method_getPlaintextKey", "name": "Cryptography\\SubstitutionTable\\Closure::getPlaintextKey", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method_getSubstitutions", "name": "Cryptography\\SubstitutionTable\\Closure::getSubstitutions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Closure", "fromLink": "Cryptography/SubstitutionTable/Closure.html", "link": "Cryptography/SubstitutionTable/Closure.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\Closure::getSubstitutionTable", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/Keyword.html", "name": "Cryptography\\SubstitutionTable\\Keyword", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Keyword", "fromLink": "Cryptography/SubstitutionTable/Keyword.html", "link": "Cryptography/SubstitutionTable/Keyword.html#method___construct", "name": "Cryptography\\SubstitutionTable\\Keyword::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Keyword", "fromLink": "Cryptography/SubstitutionTable/Keyword.html", "link": "Cryptography/SubstitutionTable/Keyword.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\Keyword::getSubstitutionTable", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/Rotary.html", "name": "Cryptography\\SubstitutionTable\\Rotary", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Rotary", "fromLink": "Cryptography/SubstitutionTable/Rotary.html", "link": "Cryptography/SubstitutionTable/Rotary.html#method___construct", "name": "Cryptography\\SubstitutionTable\\Rotary::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Rotary", "fromLink": "Cryptography/SubstitutionTable/Rotary.html", "link": "Cryptography/SubstitutionTable/Rotary.html#method_setRotation", "name": "Cryptography\\SubstitutionTable\\Rotary::setRotation", "doc": "&quot;Define the rotation value&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Rotary", "fromLink": "Cryptography/SubstitutionTable/Rotary.html", "link": "Cryptography/SubstitutionTable/Rotary.html#method_rotate", "name": "Cryptography\\SubstitutionTable\\Rotary::rotate", "doc": "&quot;Make a run of rotation&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/Simple.html", "name": "Cryptography\\SubstitutionTable\\Simple", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Simple", "fromLink": "Cryptography/SubstitutionTable/Simple.html", "link": "Cryptography/SubstitutionTable/Simple.html#method___construct", "name": "Cryptography\\SubstitutionTable\\Simple::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Simple", "fromLink": "Cryptography/SubstitutionTable/Simple.html", "link": "Cryptography/SubstitutionTable/Simple.html#method_getPlaintextKey", "name": "Cryptography\\SubstitutionTable\\Simple::getPlaintextKey", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Simple", "fromLink": "Cryptography/SubstitutionTable/Simple.html", "link": "Cryptography/SubstitutionTable/Simple.html#method_getSubstitutions", "name": "Cryptography\\SubstitutionTable\\Simple::getSubstitutions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Simple", "fromLink": "Cryptography/SubstitutionTable/Simple.html", "link": "Cryptography/SubstitutionTable/Simple.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\Simple::getSubstitutionTable", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/Square.html", "name": "Cryptography\\SubstitutionTable\\Square", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Square", "fromLink": "Cryptography/SubstitutionTable/Square.html", "link": "Cryptography/SubstitutionTable/Square.html#method___construct", "name": "Cryptography\\SubstitutionTable\\Square::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\Square", "fromLink": "Cryptography/SubstitutionTable/Square.html", "link": "Cryptography/SubstitutionTable/Square.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\Square::getSubstitutionTable", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html", "name": "Cryptography\\SubstitutionTable\\TabulaRecta", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method___construct", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_setPlaintextKey", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::setPlaintextKey", "doc": "&quot;Define the plain text key and construct the substitutions table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::getSubstitutionTable", "doc": "&quot;Get the full substitution table&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_getSubstitutionTableEntry", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::getSubstitutionTableEntry", "doc": "&quot;Get a substitution table entry&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_substitutionTableToString", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::substitutionTableToString", "doc": "&quot;Debugging&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_find", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::find", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TabulaRecta", "fromLink": "Cryptography/SubstitutionTable/TabulaRecta.html", "link": "Cryptography/SubstitutionTable/TabulaRecta.html#method_retrieve", "name": "Cryptography\\SubstitutionTable\\TabulaRecta::retrieve", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\SubstitutionTable", "fromLink": "Cryptography/SubstitutionTable.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html", "name": "Cryptography\\SubstitutionTable\\TextRepertory", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method___construct", "name": "Cryptography\\SubstitutionTable\\TextRepertory::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_buildTextAnalyzer", "name": "Cryptography\\SubstitutionTable\\TextRepertory::buildTextAnalyzer", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_setPlaintextKey", "name": "Cryptography\\SubstitutionTable\\TextRepertory::setPlaintextKey", "doc": "&quot;Define the plain text key&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_setTextAnalyzer", "name": "Cryptography\\SubstitutionTable\\TextRepertory::setTextAnalyzer", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_setOccurrenceFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::setOccurrenceFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getOccurrenceFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getOccurrenceFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_setScopeFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::setScopeFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getScopeFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getScopeFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_setCharacterFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::setCharacterFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getCharacterFlag", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getCharacterFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getPlaintextKey", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getPlaintextKey", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getSubstitutions", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getSubstitutions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\SubstitutionTable\\TextRepertory", "fromLink": "Cryptography/SubstitutionTable/TextRepertory.html", "link": "Cryptography/SubstitutionTable/TextRepertory.html#method_getSubstitutionTable", "name": "Cryptography\\SubstitutionTable\\TextRepertory::getSubstitutionTable", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Tools", "fromLink": "Cryptography/Tools.html", "link": "Cryptography/Tools/RainbowTableGenerator.html", "name": "Cryptography\\Tools\\RainbowTableGenerator", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method___construct", "name": "Cryptography\\Tools\\RainbowTableGenerator::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method_setClosure", "name": "Cryptography\\Tools\\RainbowTableGenerator::setClosure", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method_setMinLength", "name": "Cryptography\\Tools\\RainbowTableGenerator::setMinLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method_setMaxLength", "name": "Cryptography\\Tools\\RainbowTableGenerator::setMaxLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method_generate", "name": "Cryptography\\Tools\\RainbowTableGenerator::generate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTableGenerator", "fromLink": "Cryptography/Tools/RainbowTableGenerator.html", "link": "Cryptography/Tools/RainbowTableGenerator.html#method_doProcess", "name": "Cryptography\\Tools\\RainbowTableGenerator::doProcess", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Tools\\RainbowTable", "fromLink": "Cryptography/Tools/RainbowTable.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method___construct", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_getRainbowFile", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::getRainbowFile", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_setClosure", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::setClosure", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_setCharacters", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::setCharacters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_setMinLength", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::setMinLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_setMaxLength", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::setMaxLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_generate", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::generate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\RainbowTable\\FileGenerator", "fromLink": "Cryptography/Tools/RainbowTable/FileGenerator.html", "link": "Cryptography/Tools/RainbowTable/FileGenerator.html#method_doProcess", "name": "Cryptography\\Tools\\RainbowTable\\FileGenerator::doProcess", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Tools", "fromLink": "Cryptography/Tools.html", "link": "Cryptography/Tools/StringBuilder.html", "name": "Cryptography\\Tools\\StringBuilder", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method___construct", "name": "Cryptography\\Tools\\StringBuilder::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_setFlag", "name": "Cryptography\\Tools\\StringBuilder::setFlag", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_setPlaintextKeys", "name": "Cryptography\\Tools\\StringBuilder::setPlaintextKeys", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_process", "name": "Cryptography\\Tools\\StringBuilder::process", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_getCombinationNumber", "name": "Cryptography\\Tools\\StringBuilder::getCombinationNumber", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_processCombination", "name": "Cryptography\\Tools\\StringBuilder::processCombination", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_doProcessCombination", "name": "Cryptography\\Tools\\StringBuilder::doProcessCombination", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_getPermutationNumber", "name": "Cryptography\\Tools\\StringBuilder::getPermutationNumber", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_processPermutation", "name": "Cryptography\\Tools\\StringBuilder::processPermutation", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_doProcessPermutation", "name": "Cryptography\\Tools\\StringBuilder::doProcessPermutation", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringBuilder", "fromLink": "Cryptography/Tools/StringBuilder.html", "link": "Cryptography/Tools/StringBuilder.html#method_doProcessPermutationRun", "name": "Cryptography\\Tools\\StringBuilder::doProcessPermutationRun", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Cryptography\\Tools", "fromLink": "Cryptography/Tools.html", "link": "Cryptography/Tools/StringCracker.html", "name": "Cryptography\\Tools\\StringCracker", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method___construct", "name": "Cryptography\\Tools\\StringCracker::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method_setClosure", "name": "Cryptography\\Tools\\StringCracker::setClosure", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method_setMinLength", "name": "Cryptography\\Tools\\StringCracker::setMinLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method_setMaxLength", "name": "Cryptography\\Tools\\StringCracker::setMaxLength", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method_crack", "name": "Cryptography\\Tools\\StringCracker::crack", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Cryptography\\Tools\\StringCracker", "fromLink": "Cryptography/Tools/StringCracker.html", "link": "Cryptography/Tools/StringCracker.html#method_doProcess", "name": "Cryptography\\Tools\\StringCracker::doProcess", "doc": "&quot;\n&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


