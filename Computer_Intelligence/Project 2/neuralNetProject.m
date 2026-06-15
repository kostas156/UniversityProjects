clear; clc; close all;

x = linspace(-4,4,30); %-4:0.421:4; % Διάστημα μεταβλητής x.
y = linspace(-4,4,30); %-3.999:0.421:4; % Διάστημα μεταβλητής y.
[X, Y] = meshgrid(x, y); % Επίπεδο μεταβλητών x και y.
F = 0.7.*exp(cos(pi.*X))+0.3.*cos(2*pi.*Y); % Η Συνάρτηση που πρέπει να προσσεγγίσουμε.

x = reshape(X, [1 numel(X)]); % Μετατροπή των x, y και της συνάρτησης σε διανύσματα
y = reshape(Y, [1 numel(Y)]); % για να τα χρησιμοποιήσουμε ως inputs και target διανύσματα
f = reshape(F, [1 numel(F)]); % ώστε να κάνοουμε train το νευρωνικό δίκτυο.

clearvars X Y F;

P = [x;y]; T = f; % P -> Input, T-> Target

net=newff(minmax(P), [42, 28, 13, 7,1], { 'tansig','logsig','logsig','logsig','purelin'},'traingd'); 
net.numinputs = 1; %Αριθμός Εισόδων
net = configure(net,P);

%view(net)

net.divideFcn= 'dividerand'; % Διαχωρισμός δειγμάτων με τυχαίο τρόπο
net.divideParam.trainRatio = 0.8; % Train set
net.divideParam.valRatio = 0.10; % Validation set
net.divideParam.testRatio = 0.10; % Test set

net.performFcn = 'mse'; % Mean Squared Error

net.trainParam.show = 50; %epochs between displays
net.trainParam.lr = 0.01; %learning rate
net.trainParam.epochs = 175000; %maximum number of epochs to train
net.trainParam.goal = 1e-4; %performance goal
net.trainParam.max_fail = 25;

net = train(net, P, T);

f_out = net(P);

axlbl = @(h) [xlabel(h, 'X Axis'); ylabel(h,'Y Axis'); zlabel(h, 'Z Axis')]; % Ετικέτες αξόνων στα τρισδιάστατα διαγράμματα.

x_test = sort(randi([-40000,40000],1,15)./10000);
y_test = sort(randi([-40000,40000],1,15)./10000);
[X_TEST, Y_TEST] = meshgrid(x_test, y_test);
fTest = 0.7.*exp(cos(pi.*X_TEST))+0.3.*cos(2*pi.*Y_TEST);
surf(fTest)
axlbl(gca);

x_sim = reshape(X_TEST, [1, numel(X_TEST)]);
y_sim = reshape(Y_TEST, [1, numel(Y_TEST)]);

clearvars x_test y_test X_TEST Y_TEST

atest= sim(net,[x_sim; y_sim]);
atest = reshape(atest, [15 15]);
figure
surf(atest)
axlbl(gca);

absError = fTest- atest;
error = abs(absError/fTest);
figure
surf(absError)
axlbl(gca);
perce = mean(trimmean(absError, 1));
figure
ploterrhist(fTest-atest)
perf = perform(net, P, T);
