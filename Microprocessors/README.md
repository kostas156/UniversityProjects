# Binary to Decimal (BCD) & Hexadecimal Converter (ARM Assembly)

This project contains the low-level firmware source code and technical documentation for the laboratory assignment of the **Microprocessors and Applications** course at the Department of Electrical and Computer Engineering (DUTH). The system implements an optimized number-base conversion routine written entirely in **ARM Assembly (Cortex-M assembly/Thumb-2 instruction set)** for the Keil uVision IDE environment.

## 📝 Project Overview & Requirements

The primary objective is to sequentially process a block of 8-bit unsigned binary integers stored in memory, unpack their numeric components, and map their formatted decimal and hexadecimal representation back to defined memory targets.

### 📥 Input Configuration
The program targets exactly five 8-bit binary integers pre-allocated in consecutive bytes of data memory:
* **Starting Address:** `0x0201` through `0x0205`.

### 📤 Output Allocation & Mapping
For each converted binary byte, the program isolates its individual digits and writes them directly into specific target storage structures starting from `0x0300` onwards:
1.  **Decimal Form (Binary-Coded Decimal - BCD):** Unpacked into **3 distinct bytes** (one byte each for Hundreds ($D_3$), Tens ($D_2$), and Units ($D_1$)).
2.  **Hexadecimal Form:** Unpacked into **2 distinct bytes** corresponding to the upper and lower 4-bit nibbles ($H_2$ and $H_1$).

#### Memory Layout Example (for the 1st input byte):
* `0x0300` -> $D_3$ (Hundreds)
* `0x0301` -> $D_2$ (Tens)
* `0x0302` -> $D_1$ (Units)
* `0x0303` -> $H_2$ (High Hex Nibble)
* `0x0304` -> $H_1$ (Low Hex Nibble)
*(Subsequent inputs follow the exact same structural stride shifting by 5 bytes respectively).*

## ⚙️ Algorithmic Implementation

Since low-level ARM architectures lack single-cycle hardware instructions for modular decimal unpacking, the firmware leverages high-performance iterative loop structures:

* **Hexadecimal Unpacking:** Uses bitwise shift logic to decouple the 8-bit register. The lower nibble is isolated using logical left and right shifts (`LSLS` #28 followed by `LSRS` #28) to clean out upper bits, while the higher nibble is extracted via a logical right shift (`LSRS` #4).
* **Decimal Unpacking (BCD):** Executes an iterative subtraction loop (`SUBS`). The value is checked against a literal base of `10` via conditional branches (`CMP` and `BLO`). It counts the subtractions to compute the tens and hundreds components safely while avoiding runtime overheads.
* **Register Reuse:** Designed to minimize memory access overhead by keeping active counters inside the CPU register file (`R0` - `R6`, `R10` - `R12`), maximizing instruction pipelining efficiency.

## 📊 Directory Contents
* **`convert_code.txt`:** The raw ARM Assembly source code containing the complete implementation of the `convert_to_dec_hex` routine with structural comments.
* **`Project Full Description.pdf`:** The official university specification datasheet defining the conversion algorithms, test benchmarks, and memory boundary parameters.
* **`Project Report.pdf`:** The engineering report capturing code architecture blocks, step-by-step register allocations, memory mapping tables, and simulation execution displays.

## 🛠️ Environment & Tooling
* **Target Architecture:** ARM Embedded Processor Core.
* **Development IDE:** Keil uVision.
* **Language:** ARM Assembly (`__asm` inline/pure assembly driver format).

## 💡 Clarification Note
*The source files are structured as `.txt` files in this repository because formal access to the licensed Keil uVision software workspace was restricted during part of the coursework module. However, the instruction layout and assembly blocks are fully syntax-compliant and ready to be compiled into any standard Cortex-M project configuration.*