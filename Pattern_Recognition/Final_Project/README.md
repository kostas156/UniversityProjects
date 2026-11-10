
<div align="center">

# 🧠 Pattern Recognition — Final Project

### Computer Vision & Molecular Binding Classification

![Python](https://img.shields.io/badge/Python-3776AB?style=flat-square&logo=python&logoColor=white)
![PyTorch](https://img.shields.io/badge/PyTorch-EE4C2C?style=flat-square&logo=pytorch&logoColor=white)
![scikit-learn](https://img.shields.io/badge/scikit--learn-F7931E?style=flat-square&logo=scikitlearn&logoColor=white)
![Jupyter](https://img.shields.io/badge/Jupyter-F37626?style=flat-square&logo=jupyter&logoColor=white)

**Academic Coursework | Democritus University of Thrace**

Two machine learning applications exploring image classification, dimensionality reduction, and predictive modeling.

</div>

---

## 📌 Project Overview

This final coursework project consists of two independent machine learning tasks.

| Part | Application | Main Methods |
|:---|:---|:---|
| **01** | Face Mask Detection | CNNs, Data Augmentation, ResNet-18 |
| **02** | Molecular Binding Classification | PCA, LDA, MLP, SVM, Ensemble Learning |

Both tasks involve model development, experimentation, and performance evaluation.

---

## 🖼️ Part 1 — Face Mask Detection

**Objective:** Classify facial images according to whether a person is wearing a face mask.

### Dataset & Preprocessing

- 1,044 images with masks and 1,044 without masks.
- Additional set of 56 images showing incorrect mask usage.
- Stratified train/validation/test splitting (60/20/20).
- Image preprocessing and augmentation using torchvision.

### Models & Experiments

- **Custom CNNs:** Development of convolutional architectures with different depths and configurations.
- **Data Augmentation:** Experiments with image rotation, horizontal flipping, and color transformations.
- **Transfer Learning:** Adaptation and fine-tuning of a pretrained ResNet-18 for binary classification.
- **Edge-Case Analysis:** Investigation of classification behavior on incorrectly worn masks and different decision thresholds.

### Evaluation

The models were assessed using classification accuracy, confusion matrices, and Precision–Recall analysis.

📓 **[View Computer Vision Notebook](Final_Project_1_58071.ipynb)**

---

## 🧬 Part 2 — Molecular Binding Classification

**Objective:** Predict whether a chemical molecule can effectively bind to a target biological receptor.

### Dataset & Preprocessing

- 1,115 labeled molecular samples.
- 3,473 molecular descriptors per sample.
- An additional unlabeled prediction set of 124 samples.
- Feature standardization and dimensionality reduction using PCA and LDA.

### Models & Experiments

- **Neural Networks:** Development and comparison of feedforward MLP classifiers.
- **Support Vector Machines:** Classification with SVMs and hyperparameter experiments.
- **Ensemble Learning:** Combination of neural network and SVM predictions using a confidence-based selection approach.
- **Additional Exploration:** Random Forest experiments and alternative ensemble approaches.

### Evaluation

The implementations include accuracy, classification reports, confusion matrices, Precision–Recall analysis, and ROC–AUC evaluation.

The project also includes functionality for exporting predictions and confidence scores to CSV.

📓 **[View Molecular Classification Notebook](Final_Project_2_58071.ipynb)**

---

## 🛠️ Technologies

| Category | Tools |
|:---|:---|
| Programming | Python |
| Deep Learning | PyTorch, torchvision |
| Machine Learning | scikit-learn |
| Data Processing | NumPy, pandas |
| Visualization | Matplotlib, Seaborn |
| Development Environment | Jupyter Notebook, Google Colab |

---

## 📁 Repository Contents

| File | Description |
|:---|:---|
| [Final_Project_1_58071.ipynb](Final_Project_1_58071.ipynb) | Computer vision experiments |
| [Final_Project_2_58071.ipynb](Final_Project_2_58071.ipynb) | Molecular binding classification experiments |
| [test_predictions.csv](test_predictions.csv) | Generated predictions for the second task |

The repository also contains the image dataset folders, an academic report, and presentation slides.

---

## ▶️ Running the Notebooks

The notebooks were originally developed using Jupyter and Google Colab.

**Part 1:** The image notebook uses a Google Drive dataset path. Update `base_dir` to point to the image dataset before execution.

**Part 2:** The molecular classification notebook expects the following input files:

- `Train_Features.csv`
- `Train_Labels.csv`
- `Test_Features.csv`

These must be available in the notebook's working directory.

The notebooks preserve their original coursework structure and saved experimental outputs. Reproducing the experiments may require environment and path adjustments.

---

## 📖 Documentation

The original technical report and presentation slides are included in this directory.

Documentation is primarily written in Greek, as the course was taught in Greek.

---

<div align="center">

**Developed by Konstantinos Iatrou**

*Department of Electrical & Computer Engineering*  
*Democritus University of Thrace*

</div>
