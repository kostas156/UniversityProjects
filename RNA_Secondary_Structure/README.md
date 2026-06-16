# RNA Secondary Structure Prediction via Dynamic Programming

This sub-project contains the implementation, benchmarking notebooks, and empirical AI analysis for the mandatory assignment of the **Algorithms and Complexity** course at the Department of Electrical and Computer Engineering (DUTH). The system utilizes a **Dynamic Programming** pipeline (based on the Nussinov-Jacobson style recursion framework) to determine the optimal, non-crossing secondary structure base pairings for arbitrary RNA sequences.

## 📝 Project Overview & Algorithmic Logic

The objective is to compute the secondary structure of a single-stranded RNA molecule by maximizing the total number of stable base pairs (Adenine-Uracil $[A-U]$ and Cytosine-Guanine $[C-G]$) while fulfilling biological physical constraints.

### 🧬 Operational & Biological Rules
1. **Valid Pairings:** Only Watson-Crick pairs are considered valid base couplings ($A-U$ and $C-G$).
2. **No Sharp Turns:** A minimum loop length constraint is strictly enforced; a base at index $i$ cannot pair with a base at index $j$ unless there are at least 4 intervening nucleotides between them ($j - i > 4$).
3. **No Crossing/Pseudoknots:** The secondary structure cannot feature crossing pairs. If $i$ pairs with $j$ and $k$ pairs with $l$, you cannot have $i < k < j < l$.

## 🛠️ Code Architecture

The algorithmic backbone is written in Python (`RNA_Secondary_Structure_Project.ipynb`) and relies on memoized lookups:

* **`can_pair(base_1, base_2)`:** A quick lookup helper validating biochemical compatibility between complementary nucleobases using set checks.
* **`get_opt_val(i, j)`:** The core dynamic programming function. It recursively computes the maximum possible base pairs for the sub-sequence from index $i$ to $j$. It tabulates intermediary matrix scores (`opt_val[i][j]`) and keeps track of matching base indices to avoid overlapping re-computations ($O(n^3)$ complexity bounds).
* **`get_secondary_structure(n, sorted_pairs)`:** Converts the extracted coordinate pairs array into standard **Dot-Bracket Notation** (e.g., `.((....)).`), widely compliant with standard molecular visualization software like *forna*.

---

## 🤖 Bonus Part: The AI Pair Programmer Case Study

As a bonus investigative component, the project includes an exhaustive benchmark evaluation comparing manual structural engineering against **ChatGPT's (Free Edition)** code generation capability.

### 🔍 Key Technical Findings
* **The Optimization Blindspot:** While ChatGPT managed to output clean-looking Python syntax that compiled successfully, the code lacked programmatic optimization. The generated recursive blocks led to massive memory thrashing and severe context/message amnesia over long execution iterations.
* **The Structural Flaw:** Despite repeated, explicit natural language prompts restricting single nucleobases from multi-binding configurations, ChatGPT consistently suffered structural lapses. Under specific complex RNA test cases, the AI's generated code failed biological sanity checks by mistakenly forcing a single nucleobase to link into two distinct pairs simultaneously. 
* **Conclusion:** The investigation highlights the absolute necessity of rigorous manual unit testing and mathematical validation when pairing with LLMs for algorithmic design.

---

## 📊 Directory Contents
* **`RNA_Secondary_Structure_Project.ipynb`:** Main Jupyter Notebook including array initializations, dynamic programming memoization tables, and functional run tests outputting standard Dot-Bracket configurations.
* **`ChatGPT.pptx`:** The official classroom presentation detailing the step-by-step review logs, failures, recursive depth bugs, and ultimate limitations experienced while auditing ChatGPT as an automated programmer.
* **`RNA_Secondary_Structure_Brief_Presentation.pdf`:** Academic slide deck breaking down the internal Python pseudo-code structures, array slicing strategies, and the base pairing logical loops.
* **`RNA Structure Project Description.pdf`:** The formal university module coursework syllabus and theoretical guidelines.

## 🛠️ Requirements & Tools
* `Python 3.x`
* `Jupyter Notebook` / `Google Colab`

## 💻 How to Run
1. Open the Jupyter interface in your repository directory:
   ```bash
   jupyter notebook