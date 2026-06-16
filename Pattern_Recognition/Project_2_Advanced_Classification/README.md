# Non-Parametric Estimation, SVM & Dimensionality Reduction (PCA / LDA)

This repository contains the source code, Jupyter Notebooks, and technical documentation for the **2nd Assignment** of the **Pattern Recognition** course at the Department of Electrical and Computer Engineering (DUTH). The project focuses on non-parametric probability density estimation using Parzen windows, training Support Vector Machines (SVM) for linear and non-linear classification tasks, and applying dimensionality reduction techniques for high-dimensional data visualization and benchmarking.

## 📚 Structure & Task Descriptions

The project is divided into 3 distinct Jupyter Notebooks (`.ipynb`), each addressing a specific core pattern recognition topic, and is accompanied by a comprehensive technical report.

### 📑 Task 1: Probability Density Estimation via Parzen Windows (KDE)
* **File:** `Project2_1_58071.ipynb`
* **Dataset:** `Data_ex1.txt` (Features continuous 2D coordinate samples mapped to 3 distinct underlying pattern classes).
* **Implementation:** * Implements a **Kernel Density Estimation (KDE)** framework utilizing a smooth Multivariate Gaussian window function.
  * Evaluates and analyzes the explicit smoothing impact of the window width parameter $h_N$.
  * Generates extensive **3D Surface Plots** to visualize the resulting probability density functions $p(x|\omega_i)$ and evaluates how the threshold space varies from highly localized overfitting to broad over-smoothing.

### 📑 Task 2: Linear & RBF Support Vector Machines (SVM)
* **File:** `Project2_2_58071.ipynb`
* **Objective:** Train and visualize Support Vector Machines to isolate optimal hyperplanes and maximize classification margins.
* **Implementation:**
  * **Linear SVM:** Applied to a linearly separable 2D synthetic dataset to calculate the maximum-margin hyperplane, explicitly identifying and highlighting the key **Support Vectors** on the plot.
  * **Non-Linear RBF SVM:** Applied to a non-linearly separable dataset. Utilizes a Radial Basis Function (RBF) kernel to map inputs into a higher-dimensional feature space, plotting the resulting non-linear decision boundaries.

### 📑 Task 3: Dimensionality Reduction & Evaluation (PCA vs. Fisher's LDA)
* **File:** `Project2_3_58071.ipynb`
* **Dataset:** The standard **Wine Dataset** (178 samples featuring 13 morphological and chemical features across 3 distinct wine cultivars).
* **Implementation:**
  * **Principal Component Analysis (PCA):** Unsupervised reduction. Leverages the covariance matrix's eigenvectors and eigenvalues to compact the 13 features into the 2 most dominant Principal Components.
  * **Fisher's Linear Discriminant Analysis (LDA):** Supervised reduction. Maximizes between-class scatter while minimizing within-class scatter, projecting the space into 2 dimensions optimized for class separation.
  * **Statistical Benchmarking:** Trains a Bayesian Classifier on the reduced spaces. Evaluates performance using **10-fold Cross-Validation** to extract the mean classification error and standard deviation. Builds detailed **Confusion Matrices** contrasting the prediction accuracy when utilizing the first 5 original features versus all 13 features.

## 📊 Directory Contents
* **`.ipynb` files:** 3 standalone Python notebooks utilizing `scikit-learn`, `numpy`, and `matplotlib` to handle the data processing and machine learning lifecycles.
* **`Data_ex1.txt`:** Raw 2-feature training data points with class indexes.
* **`Εργασία 2 Report 58071.pdf`:** The analytical engineering report showcasing the generated 3D density topographies, SVM decision boundaries, PCA/LDA 2D scatter visualizations, and error variance metrics.

## 🛠| Requirements & Tools
* `Python 3.x`
* `numpy` & `pandas` (Matrix transformations and data manipulation)
* `scikit-learn` (SVC, PCA, LinearDiscriminantAnalysis, and cross_val_score utilities)
* `matplotlib` & `seaborn` (2D/3D scatter graphing and confusion matrix rendering)

## 💻 How to Run
1. Launch your command prompt or PowerShell inside this directory.
2. Fire up the Jupyter interface:
   ```bash
   jupyter notebook