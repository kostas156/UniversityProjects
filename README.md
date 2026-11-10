<div align="center">

# 🎓 University Projects

### Electrical & Computer Engineering
**Democritus University of Thrace (DUTH)**

A curated collection of academic projects covering software engineering, machine learning, algorithms, and computer systems.

<p>
  <img src="https://img.shields.io/badge/Academic-Coursework-2563EB?style=for-the-badge" alt="Academic Coursework"/>
  <img src="https://img.shields.io/badge/8-Course_Areas-0F766E?style=for-the-badge" alt="8 Course Areas"/>
  <img src="https://img.shields.io/badge/ECE-DUTH-334155?style=for-the-badge" alt="ECE DUTH"/>
</p>

</div>

---

### ✨ Areas of Focus

| Area | Topics |
|:---|:---|
| 🧠 **Machine Learning & AI** | Pattern Recognition, CNNs, Neural Networks, SVMs, Clustering |
| 💻 **Software Engineering** | Web Applications, API Integration, Databases |
| ⚙️ **Algorithms & Optimization** | Dynamic Programming, Genetic Algorithms |
| 🔌 **Computer Systems** | ARM Programming, SystemVerilog |
| 📊 **Signal Processing** | Wiener Filtering, Audio Denoising |

> **📖 Language note:** Most technical reports are written in Greek, as the corresponding courses were taught in Greek.


## ⭐ Featured Projects

A selection of projects highlighting practical experience in machine learning, software development, and computational methods.

| 🧠 Machine Learning & Computer Vision | 🌐 Software Engineering & APIs |
|:---|:---|
| **[Face Mask Detection & Molecular Binding Prediction](Pattern_Recognition/Final_Project/)** | **[Earthquake Information Website](Software_Engineering/)** |
| Image classification using CNNs and ResNet-18, alongside machine learning approaches for predicting molecular binding affinity. | A web development project focused on presenting earthquake information through an external API. |
| `CNN` `ResNet-18` `PCA` `SVM` | `Web Development` `API Integration` |

| 🧬 Computational Intelligence | 🗄️ Databases & Web Applications |
|:---|:---|
| **[Genetic Algorithm for the Knapsack Problem](Computer_Intelligence/)** | **[UniSystem — University Grading System](Databases/)** |
| MATLAB implementation of a genetic algorithm for the 0-1 Knapsack Problem, including improvements to computational efficiency. | A university administration and grading application built using PHP and MySQL, supporting multiple user roles. |
| `MATLAB` `Genetic Algorithms` `Optimization` | `PHP` `MySQL` `Bootstrap` |

---


## 📂 Explore the Projects

Browse the projects by course and technical area.

| Course | Projects & Topics |
|:---|:---|
| 🧠 **[Pattern Recognition](Pattern_Recognition/)** | Bayesian Classification, SVMs, PCA/LDA, Clustering, CNNs, Transfer Learning |
| 💻 **[Software Engineering](Software_Engineering/)** | Earthquake Information Web Application, API Integration |
| 🗄️ **[Databases](Databases/)** | UniSystem — University Administration & Grading System |
| 🧬 **[Computer Intelligence](Computer_Intelligence/)** | Genetic Algorithms, Neural Networks, Fuzzy Logic |
| ⚙️ **[Algorithms & Complexity](RNA_Secondary_Structure/)** | RNA Secondary Structure, Dynamic Programming |
| 🔌 **[Integrated Circuits](Integrated_Circuits/)** | Hardware-Based Tic-Tac-Toe, SystemVerilog |
| 🖥️ **[Microprocessors](Microprocessors/)** | ARM Programming, Number Base Conversion |
| 📊 **[Digital Signal Processing](DSP/)** | Wiener Filtering, Audio Denoising, Linear Prediction |

Each folder contains the available project implementations, documentation, and supporting materials.

---



## 💻 Software Engineering

### 🌍 Earthquake Information Website

A university coursework project focused on developing a web application that retrieves and presents earthquake-related information through an external API.

**Key topics:** Web Development · API Integration · Data Presentation

📁 **[View Project](Software_Engineering/)**

---



## 🔌 Microprocessors and Applications

### 🔢 Number Base Conversion on ARM

A university coursework project exploring number-base conversion using an ARM processor.

**Key topics:** ARM Architecture · Number Systems

📁 **[View Project](Microprocessors/)**

---

## Integrated Circuits

### 🚀 Tic Tac Toe Game using SystemVerilog

- **Project Name:** Hardware-Based Tic-Tac-Toe Game with AI Move Generator
- **Description:** A structural SystemVerilog implementation of a Tic-Tac-Toe game engineered for FPGA deployment. Features concurrent turn-management state machines, automated end-game win/tie evaluation logic, physical button debounce interfaces, and a specialized combinational AI Move Generator that dynamically computes optimal winning, blocking, or fallback moves.
- **Folder:** [Integrated_Circuits](/Integrated_Circuits)

## Databases

### 🚀 Grading System Website with MySQL Database

- **Project Name:** UniSystem - University Administration & Grading Information System
- **Description:** A comprehensive web-based management portal matching a MySQL relational database with a PHP/Bootstrap frontend. Features cryptographic session management, role-based access for students/professors/secretariat, dynamic DataTables filtering, and automated GPA/ECTS calculations.
- **Folder:** [Databases](/Databases)

## Computer Intelligence

### 🚀 Knapsack Problem using Genetic Algorithm
- **Description:** Implementation of a Genetic Algorithm (GA) in MATLAB to solve and maximize the total value of a 100-item 0-1 Knapsack Problem under capacity constraints. Applied critical performance optimization techniques (fitness score caching, removing redundant evaluation/import calls), drastically reducing execution runtime from 50-60 minutes down to just **3 – 4.5 seconds**.
- **Folder:** [Computer_Intelligence/Project1_Genetic_Algorithms](/Computer_Intelligence/Project1_Genetic_Algorithms)

### 🚀 Function Approximation using Neural Networks (MLP)
- **Description:** Training a Multi-layer Perceptron (MLP) Feedforward Neural Network with 4 hidden layers and a `[42, 28, 13, 7, 1]` topology in MATLAB to approximate a non-linear mathematical function of two variables. Utilized Gradient Descent (`traingd`) combined with Early Stopping to successfully prevent premature overfitting.
- **Folder:** [Computer_Intelligence/Project_2_Neural_Networks](/Computer_Intelligence/Project_2_Neural_Networks)

### 🚀 Fuzzy Cruise Control System
- **Description:** Design and simulation of a Mamandani Fuzzy Inference System (FIS) in MATLAB to automatically control and stabilize a vehicle's cruising speed at 120 km/h. Modeled using tailored membership functions (Gaussian profiles combined with narrow triangular shapes (`trimf`)) for highly precise acceleration handling.
- **Folder:** [Computer_Intelligence/Project_3_Fuzzy_Logic](/Computer_Intelligence/Project_3_Fuzzy_Logic)

## Pattern Recognition

### 🚀 Bayesian Classification & Decision Theory
- **Description:** A series of 5 core tasks developed in Python (Jupyter Notebooks) covering: Bayesian email spam classification, mathematical definition of decision regions and experimental evaluation of minimal Bayes Risk, 3-class Multivariate Gaussian classifiers, theoretical and graphic worst-case error bound analysis, and Recursive Bayesian Parameter Estimation handled via Beta Distribution modeling.
- **Folder:** [Pattern_Recognition/Project_1_Bayesian_Theory](/Pattern_Recognition/Project_1_Bayesian_Theory)

### 🚀 Non-Parametric Estimation, SVM & Dimensionality Reduction (PCA/LDA)
- **Description:** Implementation of Non-Parametric Probability Density Estimation utilizing Parzen Windows (Kernel Density Estimation) to study the smoothing factor $h_N$. Training Linear and RBF Support Vector Machines (SVM) to evaluate and plot decision boundaries and Support Vectors. Dimensionality reduction and multi-feature evaluation executed over the Wine Dataset using Principal Component Analysis (PCA) and Fisher's Linear Discriminant Analysis (LDA), benchmarked via 10-fold Cross-Validation and Confusion Matrices.
- **Folder:** [Pattern_Recognition/Project_2_Advanced_Classification](/Pattern_Recognition/Project_2_Advanced_Classification)

### 🚀 Clustering, Feature Selection (PCA) & Multidimensional Scaling (MDS)
- **Description:** Unsupervised learning pipeline evaluated on the morphological Seeds dataset using K-Means and Hierarchical Agglomerative Clustering across Euclidean and Cosine distances, benchmarked via Rand Index and Silhouette Coefficients. Features were optimized using PCA to preserve variance targets ($90\%$ & $95\%$). Includes coordinate map reconstruction from raw air distance matrices via Classical Multidimensional Scaling (MDS) in 2D and 3D spaces to study earth curvature constraints.
- **Folder:** [Pattern_Recognition/Project_3_Clustering_MDS](/Pattern_Recognition/Project_3_Clustering_MDS)


### 🧠 Final Term Project — Computer Vision & Machine Learning

A two-part academic project exploring deep learning for image classification and machine learning for molecular binding prediction.

**Part 1 — Face Mask Detection**
- Developed and evaluated Convolutional Neural Networks (CNNs) for face mask image classification.
- Explored transfer learning using ResNet-18.
- Investigated model performance on different image classification cases.

**Part 2 — Molecular Binding Prediction**
- Explored machine learning methods for predicting molecular binding affinity.
- Applied Principal Component Analysis (PCA) for dimensionality reduction.
- Experimented with Multilayer Perceptrons (MLPs), Support Vector Machines (SVMs), and ensemble approaches.

**Key Topics:** `Computer Vision` · `CNN` · `ResNet-18` · `Transfer Learning` · `PCA` · `MLP` · `SVM`

📁 **[View Project](Pattern_Recognition/Final_Project/)**

---


## Algorithms and Complexity

### 🚀 RNA Secondary Structure

- **Project Name:** RNA Secondary Structure
- **Description:** Given an RNA sequence, calculate the RNA Secondary structure with the most bonds possible. Dynamic programming was used for the important function of the project. The project is implemented in python using a Jupyter Notebook.
- **Folder:** [RNA_Secondary_Structure](/RNA_Secondary_Structure)


## Digital Signal Processing

### 🚀 Wiener Filter Implementation

- **Project Name:** Audio Denoising & Linear Prediction using Wiener Filters
- **Description:** GMATLAB framework implementing optimal Wiener Filtering strategies for audio restoration. Features global and short-time frame-based processing (Hanning windowed Overlap-Add), adaptive noise covariance estimation from unvoiced silent intervals, and multi-step forward Linear Prediction modeling evaluated via SNR benchmarking.
- **Folder:** [DSP](/DSP)

## 📝 License

This repository is licensed under the [MIT License](LICENSE).

## 📧 Contact

If you have any questions or would like to get in touch, feel free to reach out to me at **kon.iatrou06@gmail.com**.

<div align="center">
  <sub>Built by Konstantinos Iatrou</sub>
</div>
