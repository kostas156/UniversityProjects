# Solving the Knapsack Problem using Genetic Algorithms

This repository contains a **Genetic Algorithm (GA)** implementation developed in **MATLAB** to solve the 0-1 Knapsack Problem[cite: 60]. This project was developed as part of the **Computational Intelligence** course at the Department of Electrical and Computer Engineering of the Democritus University of Thrace (DUTH)[cite: 60].

## 📝 Problem Description
The problem provides a set of 100 distinct items, where each item is characterized by its weight (size) and its value[cite: 60]. The goal of the algorithm is to select the optimal combination of items that maximizes the total value, without exceeding the predefined weight limit of the knapsack (Capacity)[cite: 60].

Solutions are represented as binary vectors (chromosomes) with a length of 100, where a value of `1` indicates the item is selected, and `0` indicates it is rejected[cite: 60].

## 🛠️ Architecture & Code Structure
The implementation is modular and consists of the following MATLAB (`.m`) files[cite: 60]:

* **`solveKnapsack.m`**: The main function (driver script) that initializes the population, executes the generational loop (iterations), and generates convergence plots (Average & Max Fitness)[cite: 60].
* **`imp_vals.m`**: Loads the item data (weights, values, and knapsack capacity) from the input file `knapsack.xls`[cite: 60].
* **`fit_co.m`**: The fitness function that evaluates each solution based on its total value[cite: 60]. If a solution violates the weight limit, it receives a penalty (fitness = 0)[cite: 60].
* **`nextGeneration.m`**: Manages the transition to the next generation by applying elitism, selection, crossover, and mutation[cite: 60].
* **`myRouletteSel.m`**: Implements the parent selection mechanism using the **Roulette Wheel Selection** method[cite: 60].
* **`crossover.m`**: Performs the crossover of parent chromosomes to generate offspring[cite: 60].
* **`mutation.m`**: Applies random mutation (bit-flip) to the offspring based on a predefined mutation probability[cite: 60].
* **`pass_n_toNextGen.m`**: Implements **Elitism**, ensuring that the top $n$ solutions of each generation pass directly and unaltered into the next generation[cite: 60].
* **`test_final.m`**: A script designed to run 50 consecutive experiments (Monte Carlo simulations) for the statistical evaluation of the algorithm's stability and speed[cite: 60].

## 🚀 Performance Optimization
During the development of the code, critical optimization techniques were applied to drastically reduce execution runtime[cite: 60]:
1. **Reducing Redundant Calls**: Avoided executing `imp_vals()` inside the Fitness Function loop[cite: 60].
2. **Fitness Caching**: Chromosome fitness evaluation is computed only once per generation and passed as an input parameter to the selection (`myRouletteSel`) and elitism (`pass_n_toNextGen`) functions[cite: 60].

**Result:** The execution runtime was dramatically slashed from an initial **50–60 minutes** down to just **3 – 4.5 seconds** in the final optimized version, while maintaining the same high success rate in discovering the optimal solution[cite: 60].

## 📊 Input Data
The item dataset is located in the following file:
* `knapsack.xls` (Contains the item weights, values, target weight capacity, and the problem dimensions)[cite: 60].

## 💻 How to Run
1. Open MATLAB and set the project directory as your Current Folder[cite: 60].
2. To run a single execution and view the convergence graphs, type the following command in the Command Window[cite: 60]:
```matlab
   solveKnapsack();