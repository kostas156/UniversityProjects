# Hardware-Based Tic-Tac-Toe Game with AI Move Generator (SystemVerilog)

This sub-project contains the digital design components, testbenches, and hardware constraints for the laboratory assignment of the **Integrated Circuits** course at the Department of Electrical and Computer Engineering (DUTH). The system implements a fully functional, hardware-driven **Tic-Tac-Toe game** featuring an automated, rule-based AI Move Generator for the computer opponent.

## 📝 Project Overview & Game Logic

The architecture targets an FPGA development board, interfacing with physical buttons for directional player navigation (`Up`, `Down`, `Left`, `Right`) and validation (`Play`), while tracking state machines for game progression, player turns, and win/tie conditions.

### 🤖 AI Move Generator (`MoveGen.sv`)
When it is the computer's turn (Player O), the hardware evaluates the entire $3 \times 3$ grid board combination concurrently using dynamic combinational layers:
1. **Win Strategy (`winnerO.sv`):** Scans the board to see if Player O has two tokens in a row/column/diagonal with an empty third cell, instantly placing the winning token.
2. **Block Strategy (`blockO.sv`):** If no immediate win is available, it checks if Player X (the human) has two tokens in a line, automatically placing a blocking token to defend the position.
3. **Default/Empty Strategy (`empty.sv`):** If there are no winning or blocking opportunities, the system picks the next available empty cell based on a fixed scanning hierarchy.
4. **Selector Module (`selectO.sv`):** A hardwired multiplexing prioritization tree that filters the outputs of the strategies above, executing the safest optimal move.

## 🛠️ Hardware Architecture & Modules

The design is built completely using synthesizable **SystemVerilog** structural and behavioral logic blocks:

* **`top.sv`:** The root structural module. It manages the global clock, synchronous reset paths, register state maps for both players (`rX_test`, `rO_test`), active cursor coordinate updates, turn switching mechanics, and maps output buses for display processing.
* **`Tic_Tac_Toe_Win_Checker.sv`:** Pure combinational reduction networks that analyze row, column, and diagonal bit patterns simultaneously to trigger `win_X`, `win_O`, or `tie` status registers.
* **Verification Testbenches:** * `top_test.sv`: Simulates a complete interactive game cycle, driving sequential button pulses and evaluating system responses.
  * `MoveGen_test.sv`: Validates the AI decision-making matrix across multiple pre-staged board states, outputting expected bit-vectors to verify convergence.
* **`lab3_pins.xdc`:** Xilinx Design Constraints file mapping the clock input, switch-based system reset, and button signals onto physical FPGA hardware pin locations, prepared with preset VGA output channel specifications (`red`, `green`, `blue`, `hsync`, `vsync`).

## 📊 Directory Contents
* **`top.sv` / `top_test.sv`:** Core top-level state manager and its verification testbench.
* **`MoveGen.sv` / `MoveGen_test.sv`:** The tactical decision system and its evaluation suite.
* **Tactical sub-modules:** `winnerO.sv` (Win engine), `blockO.sv` (Defense engine), `empty.sv` (Fall-back placement finder), `selectO.sv` (Priority multiplexer).
* **`Tic_Tac_Toe_Win_Checker.sv`:** Boolean end-game evaluation module.
* **`lab3_pins.xdc`:** Target FPGA constraint mapping configuration.

## 🛠️ Requirements & Tooling
* **HDL Language:** SystemVerilog (`IEEE 1800-2012`).
* **Synthesis & Simulation Suite:** Xilinx Vivado Design Suite / ModelSim / EDA Playground.
* **Target Environment:** FPGA Digital Development Platform.

## 💻 Simulation & Deployment
1. Load the SystemVerilog modules into your Vivado or EDA simulation project workspace.
2. Compile and launch `top_test.sv` inside your simulator engine to monitor the internal waveforms (`dump.vcd`) and review state transitions.
3. For hardware deployment, initialize a synthesis run targeting your FPGA board, incorporating `lab3_pins.xdc` to secure standard IO device pin allocations.