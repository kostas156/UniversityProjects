# Bayesian Classification & Decision Theory (Pattern Recognition)

This repository contains the source code, Jupyter Notebooks, and technical documentation for the **1st Assignment** of the **Pattern Recognition** course at the Department of Electrical and Computer Engineering (DUTH). The project focuses on applying Bayesian decision criteria, minimizing Bayes Risk under specific loss matrices, managing multivariate normal distributions, and evaluating recursive parameter estimation.

## 📚 Structure & Task Descriptions

The project is split into 5 dedicated Jupyter Notebooks (`.ipynb`), each addressing a specific academic task, and is backed by a comprehensive mathematical report.

### 📑 Task 1: Email Spam & Malicious Classification
* **File:** `Project1_1_58071.ipynb`
* **Objective:** Design a structural classification system sorting incoming emails into 3 distinct classes: *Normal* ($n$), *Spam* ($s$), and *Malicious* ($m$).
* **Implementation:** Calculates the posterior probabilities $P(\omega_i|D)$ across 5 different threat indicators ($D_1$ to $D_5$) based on given prior probabilities and likelihood metrics to optimize class assignments.

### 📑 Task 2: Two-Category Decision Boundaries & Bayes Risk Minimization
* **File:** `Project1_2_58071.ipynb`
* **Objective:** Define the optimal decision regions and calculate the absolute minimal Bayes Risk (overall average cost) for two single-dimensional normal distributions $p(x|\omega_1) \sim N(-1, 1)$ and $p(x|\omega_2) \sim N(1, 1)$.
* **Implementation:** Integrates a localized loss matrix penalizing false negatives and false positives differently. Computes the numerical decision boundaries where the conditional risks intersect.

### 📑 Task 3: Multi-Feature Multivariate Gaussian Classifier
* **File:** `Project1_3_58071.ipynb`
* **Objective:** Build a 3-class multivariate Bayesian classifier operating over 2 separate continuous features ($x_1, x_2$) assuming normal distribution profiles.
* **Implementation:** * **Sub-task A:** Implements a single-feature classifier using only $x_1$ and evaluates the empirical error rate.
  * **Sub-task B:** Expands the network into a 2D feature space using both $x_1$ and $x_2$ concurrently. The comparison demonstrates how adding relevant statistical features shrinks the decision error rate.

### 📑 Task 4: Error Probability Bounds & Worst-Case Analysis
* **File:** `Project1_4_58071.ipynb`
* **Objective:** Analytically determine the optimal decision threshold $\hat{x}$ that minimizes the total error probability for two Gaussian classes with identical variances.
* **Implementation:** Mathematical derivation of the ideal threshold by taking derivatives of the error function. Includes visualizations charting out how the error rate scales under worst-case prior setups vs. ideal conditions.

### 📑 Task 5: Recursive Bayesian Parameter Estimation
* **File:** `Project1_5_58071.ipynb`
* **Objective:** Estimate the unknown bias parameter $\theta$ (probability of landing heads) of a coin after observing $N=10$ sequential flips with a predefined structural pattern, initialized via a Beta Distribution prior.
* **Implementation:** Recursively updates and plots the true continuous probability density function $p(\theta|D^N)$ for iterations $N=1, 5, 10$. Computes the absolute posterior probability for the next flip (tails) via adaptive numerical integration using variable discretization steps ($d\theta$) to maintain high precision.

## 📊 Directory Contents
* **`.ipynb` files:** 5 standalone Python notebooks implementing the statistical computations, classifiers, loops, and visualization curves.
* **`Εργασία 1 Report 58071.pdf`:** The formal technical report featuring detailed handwritten/typed mathematical proofs, derivative calculations, truth tables, and final output charts.

## 🛠️ Requirements & Tools
* `Python 3.x`
* `numpy` (Vectorized matrix calculations and array structures)
* `scipy` (Numerical integration routines and statistical distributions)
* `matplotlib` & `seaborn` (Probability density curves and decision region plots)

## 💻 How to Run
1. Open your terminal or PowerShell inside this directory.
2. Launch Jupyter Notebook:
   ```bash
   jupyter notebook